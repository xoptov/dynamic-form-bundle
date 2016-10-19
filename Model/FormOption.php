<?php

namespace Xoptov\DynamicFormBundle\Model;

abstract class FormOption extends Option implements FormOptionInterface
{
    /** @var FormInterface */
    protected $form;

    /**
     * {@inheritdoc}
     */
    public function setForm(FormInterface $form)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getForm()
    {
        return $this->form;
    }
}