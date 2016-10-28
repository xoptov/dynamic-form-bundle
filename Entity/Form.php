<?php

namespace Xoptov\DynamicFormBundle\Entity;

use Xoptov\DynamicFormBundle\Model\Form as BaseForm;
use Xoptov\DynamicFormBundle\Model\FormInterface;

class Form extends BaseForm
{
    public function addChildren(FormInterface $child)
    {
        $child->setParent($this);
        return parent::addChildren($child);
    }
}
