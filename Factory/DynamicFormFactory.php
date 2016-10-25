<?php

namespace Xoptov\DynamicFormBundle\Factory;

use Xoptov\DynamicFormBundle\Exception\OptionException;
use Xoptov\DynamicFormBundle\Model\FormInterface;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface as BaseFormInterface;
use Xoptov\DynamicFormBundle\Model\FormOptionInterface;
use Xoptov\DynamicFormBundle\DataStructure\FormHeap;

class DynamicFormFactory
{
    /** @var FormFactoryInterface */
    private $formFactory;

    /**
     * DynamicFormFactory constructor.
     * @param FormFactory $formFactory
     */
    public function __construct(FormFactory $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @param FormInterface $description
     * @param mixed $data
     * @return BaseFormInterface
     */
    public function createForm(FormInterface $description, $data)
    {
        $options = $this->createOptions($description);
        $formBuilder = $this->formFactory->createBuilder($description->getClass(), $data, $options);
        $this->appendFields($formBuilder, $description);

        return $formBuilder->getForm();
    }

    /**
     * @param FormInterface $description
     * @return array
     */
    private function createOptions(FormInterface $description)
    {
        $options = array();

        /** @var FormOptionInterface $formOption */
        foreach ($description->getOptions() as $formOption) {
            if ($formOption->getOption() == null) {
                throw new OptionException('Option must be set.');
            }

            $option = $formOption->getOption();

            if ($option->getName() == null) {
                throw new OptionException('Name must be set.');
            }

            if ($formOption->getValue() != null) {
                $options[$option->getName()] = $formOption->getValue();
            } else {
                // TODO: This part need rewrite with children support.
                throw new OptionException('Value must be set.');
            }
        }

        return $options;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param FormInterface $description
     */
    private function appendFields(FormBuilderInterface $builder, FormInterface $description)
    {
        $fields  = new FormHeap();
        $parent = $description->getParent();

        if ($parent != null && $parent instanceof FormInterface && $parent->isForm()) {
            $this->inheritParentFields($fields, $parent);
        }

        foreach ($description->getChildren() as $child) {
            $fields->insert($child);
        }

        /** @var FormInterface $field */
        foreach ($fields as $field) {
            // There we filter and replace form instances.
            if ($field->isEnabled() && $field->isField()) {
                $options = $this->createOptions($field);
                $builder->add($field->getName(), $field->getClass(), $options);
            }
        }
    }

    /**
     * @param \SplHeap $fields
     * @param FormInterface $form
     */
    private function inheritParentFields(\SplHeap $fields, FormInterface $form)
    {
        $parent = $form->getParent();

        // Now inheritance able only for form instances.
        if ($parent != null && $parent instanceof FormInterface && $parent->isForm()) {
            $this->inheritParentFields($fields, $parent);
        }

        /** @var FormInterface $child */
        foreach ($form->getChildren() as $child) {
            if ($child->isField()) {
                $fields->insert($child);
            }
        }
    }
}