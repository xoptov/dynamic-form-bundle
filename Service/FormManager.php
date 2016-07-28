<?php

namespace Xoptov\DynamicFormBundle\Service;

use Xoptov\DynamicFormBundle\Model\FormInterface;

class FormManager
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
}