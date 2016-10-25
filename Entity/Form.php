<?php

namespace Xoptov\DynamicFormBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Xoptov\DynamicFormBundle\Model\Form as BaseForm;
use Xoptov\DynamicFormBundle\Model\FormInterface;

class Form extends BaseForm
{
    public function __construct()
    {
        $this->options = new ArrayCollection();
        $this->children = new ArrayCollection();
    }

    public function addChildren(FormInterface $child)
    {
        $child->setParent($this);
        return parent::addChildren($child);
    }
}
