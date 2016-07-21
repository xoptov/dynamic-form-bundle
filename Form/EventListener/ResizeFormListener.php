<?php

namespace Xoptov\DynamicFormBundle\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Xoptov\DynamicFormBundle\Model\Field;

class ResizeFormListener implements EventSubscriberInterface
{
    /** @var array */
    private $options;

    /**
     * ResizeFormListener constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->options = $options;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT => 'preSubmit',
            // (MergeCollectionListener, MergeDoctrineCollectionListener)
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

        if (null === $data) {
            $data = array();
        }

        if (!is_array($data) && !($data instanceof \Traversable && $data instanceof \ArrayAccess)) {
            throw new UnexpectedTypeException($data, 'array or (\Traversable and \ArrayAccess)');
        }

        // First remove all rows
        foreach ($form as $name => $child) {
            $form->remove($name);
        }

        /**
         * @var string $name
         * @var Field $value
         */
        foreach ($data as $name => $value) {
            $form->add($name, $value->getClass(), array_replace(array(
                'property_path' => '['.$name.']',
            ), $this->options));
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