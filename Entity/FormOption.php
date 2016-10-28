<?php

namespace Xoptov\DynamicFormBundle\Entity;

use Xoptov\DynamicFormBundle\Model\FormInterface;
use Xoptov\DynamicFormBundle\Model\FormOption as BaseFormOption;
use Xoptov\DynamicFormBundle\Model\FormOptionInterface;

class FormOption extends BaseFormOption
{
    /** @var int */
    protected $id;

    /** @var FormOptionInterface */
    protected $parent;

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
     * @param FormOptionInterface $parent
     * @return FormOption
     */
    public function setParent(FormOptionInterface $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return FormOptionInterface
     */
    public function getParent()
    {
        return $this->parent;
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

    public function addChildren(FormOptionInterface $child)
    {
        /** @var FormOption $child */
        $child->setParent($this);
        return parent::addChildren($child);
    }
}