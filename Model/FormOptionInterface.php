<?php

namespace Xoptov\DynamicFormBundle\Model;

interface FormOptionInterface extends OptionInterface
{
    /**
     * @param FormInterface $form
     * @return FormOptionInterface
     */
    public function setForm(FormInterface $form);

    /**
     * @return FormInterface
     */
    public function getForm();
}