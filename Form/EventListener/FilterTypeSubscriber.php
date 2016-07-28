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
use Xoptov\DynamicFormBundle\Model\Filter;
use Xoptov\DynamicFormBundle\Model\Measure;
use Xoptov\DynamicFormBundle\Model\Property;

class FilterTypeSubscriber implements EventSubscriberInterface
{
    /** @var boolean */
    protected $deleteEmpty;

    /**
     * FilterTypeSubscriber constructor.
     * @param bool $deleteEmpty
     */
    public function __construct($deleteEmpty = false)
    {
        $this->deleteEmpty = $deleteEmpty;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::SUBMIT => array('onSubmit', 50),
        );
    }

    /**
     * @param FormEvent $event
     */
    public function preSetData(FormEvent $event)
    {
        $form = $event->getForm();
        $data = $event->getData();

        if (!$data instanceof Filter) {
            throw new UnexpectedTypeException($data, 'Xoptov\\DynamicFormBundle\\Model\\Filter');
        }

        if (count($data->getFields())) {
            $form->add('fields', FieldCollectionType::class, array(
                'label' => 'Фильтр',
                'required' => false
            ));
            $fieldsCollection = $form->get('fields');

            /** @var Field $field */
            foreach ($data->getFields() as $key => $field) {
                // Hide disabled fields
                if ($field->isEnabled() == false) {
                    continue;
                }

                /** @var Property $property */
                $property = $field->getProperty();

                $options = array(
                    'property_path' => sprintf("[%s].value", $key),
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
                $fieldsCollection->add($key, $field->getClass(), array_replace($options, $field->getOptions()));
            }
        }
    }

    /**
     * @param FormEvent $event
     */
    public function onSubmit(FormEvent $event)
    {
        $form = $event->getForm();
        $data = $event->getData();

        if (!$data instanceof Filter) {
            throw new UnexpectedTypeException($data, 'Xoptov\\DynamicFormBundle\\Model\\Filter');
        }

        if ($this->deleteEmpty) {
            $fields = $form->get('fields');
            foreach ($fields as $key => $child) {
                if ($child->isEmpty()) {
                    $data->removeField($key);
                }
            }
        }

        $event->setData($data);
    }
}