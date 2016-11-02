<?php

namespace Xoptov\DynamicFormBundle\Form\EventListener;

use AppBundle\Form\Type\AdvertPropertyType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class DynamicFormListener implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'onPreSetData',
            FormEvents::PRE_SUBMIT => 'onPreSubmit',
            FormEvents::SUBMIT => 'onSubmit'
        );
    }

    /**
     * @param FormEvent $event
     */
    public function onPreSetData(FormEvent $event)
    {
        $form = $event->getForm();
        $data = $event->getData();
    }

    public function onPreSubmit(FormEvent $event)
    {
        $form = $event->getForm();
        $data = $event->getData();

        if ($form->isRoot() && $form->getConfig()->getDataClass()) {
            $reflector = new \ReflectionClass($form->getConfig()->getDataClass());
            $extendedData = array();
            foreach ($data as $key => $value) {
                if ($reflector->hasProperty($key) == true) {
                    continue;
                }

                $extendedData[$key]['value'] = $value;
                unset($data[$key]);

                if ($form->has($key)) {
                    $field = $form->get($key);
                    $field->getConfig()->get;
                }
            }

            if (count($extendedData) > 0) {
                $form->add('properties', CollectionType::class, array(
                    'entry_type' => AdvertPropertyType::class,
                    'allow_add' => true
                ));

                $data['properties'] = $extendedData;
            }
            $event->setData($data);
        }
    }

    /**
     * @param FormEvent $event
     */
    public function onSubmit(FormEvent $event)
    {
        $form = $event->getForm();
        $data = $event->getData();
    }
}