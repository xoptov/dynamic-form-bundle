<?php

namespace Xoptov\DynamicFormBundle\Service;

use Xoptov\DynamicFormBundle\Model\Field;
use Xoptov\DynamicFormBundle\Model\Filter;
use Xoptov\DynamicFormBundle\Model\FormInterface;

class FilterManager
{
    /**
     * @param FormInterface $form
     * @param \SplObjectStorage $fields
     */
    public function inheritFields(FormInterface $form, \SplObjectStorage $fields)
    {
        if (count($form->getFields())) {
            foreach ($form->getFields() as $field) {
                if (!$fields->contains($field)) {
                    $fields->attach($field);
                };
            }
        } elseif ($parent = $form->getParent()) {
            $this->inheritFields($parent, $fields);
        }

        return;
    }

    /**
     * @param FormInterface $form
     * @return Filter
     */
    public function createFilterModel(FormInterface $form)
    {
        $fields = new \SplObjectStorage();
        $this->inheritFields($form, $fields);

        $filter = new Filter();

        /** @var Field $field */
        foreach ($fields as $field) {
            if ($field->isEnabled()) {
                $filter->appendField($field);
            }
        }

        return $filter;
    }
}