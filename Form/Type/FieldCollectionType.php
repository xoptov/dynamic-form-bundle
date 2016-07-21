<?php

namespace Xoptov\DynamicFormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Xoptov\DynamicFormBundle\Form\EventListener\ResizeFormListener;

class FieldCollectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $resizeListener = new ResizeFormListener(
            $options['entry_options']
        );

        $builder->addEventSubscriber($resizeListener);
    }
}