<?php

namespace Xoptov\DynamicFormBundle\Entity;

use Xoptov\DynamicFormBundle\Model\FormInterface;
use Xoptov\DynamicFormBundle\Model\FormOption as BaseFormOption;

abstract class FormOption extends BaseFormOption
{
    /** @var int */
    protected $id;

    /** @var FormInterface */
    protected $form;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param FormInterface $form
     * @return FormOption
     */
    public function setForm(FormInterface $form)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * @return FormInterface
     */
    public function getForm()
    {
        return $this->form;
    }
}