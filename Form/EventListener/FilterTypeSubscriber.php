<?php

namespace Xoptov\DynamicFormBundle\Form\EventListener;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormInterface as BaseFormInterface;
use Xoptov\DynamicFormBundle\Form\Type\FieldCollectionType;
use Xoptov\DynamicFormBundle\Model\Field;
use Xoptov\DynamicFormBundle\Model\FormInterface;
use Xoptov\DynamicFormBundle\Model\Measure;
use Xoptov\DynamicFormBundle\Model\Property;
use Xoptov\DynamicFormBundle\Service\FormManager;

class FilterTypeSubscriber implements EventSubscriberInterface
{
    /** @var FormManager */
    protected $formManager;

    /**
     * FilterTypeSubscriber constructor.
     * @param FormManager $formManager
     */
    public function __construct(FormManager $formManager)
    {
        $this->formManager = $formManager;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT => 'preSubmit',
            FormEvents::SUBMIT => array('onSubmit', 50),
        );
    }

    /**
     * @param FormEvent $event
     */
    public function preSetData(FormEvent $event)
    {
        /** @var Form $form */
        $form = $event->getForm();

        /** @var FormInterface $data */
        $data = $event->getData();

        if (!$data instanceof FormInterface) {
            throw new UnexpectedTypeException($data, 'Xoptov\\DynamicFormBundle\\Model\\FormInterface');
        }

        $fields = new \SplObjectStorage();
        $this->formManager->inheritFields($data, $fields);

        if (count($fields)) {
            $form->add('fields', FieldCollectionType::class, array(
                'label' => 'Фильтр',
                'required' => false
            ));
            $fieldsCollection = $form->get('fields');

            /** @var Field $field */
            foreach ($fields as $field) {
                /** @var Property $property */
                $property = $field->getProperty();

                $options = array(
                    'property_path' => sprintf("[%s]", $field->getId()),
                    'required' => false
                );

                if ($field->getClass() == ChoiceType::class) {
                    if (count($property->getValues())) {
                        $options['choices'] = $property->getValues();
                    } else {
                        $options['choices'] = array('Нет', 'Да');
                    }
                }

                /** @var Measure $measure */
                if ($measure = $property->getMeasure()) {
                    $options['label'] = sprintf("%s(%s)", $property->getName(), $measure->getLabel());
                } else {
                    $options['label'] = $property->getName();
                }

                /** @var BaseFormInterface $fieldsCollection */
                $fieldsCollection->add($field->getId(), $field->getClass(), array_replace($options, $field->getOptions()));
            }
        }
    }

    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        xdebug_break();
    }

    /**
     * @param FormEvent $event
     */
    public function onSubmit(FormEvent $event)
    {
        xdebug_break();
    }
}