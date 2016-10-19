<?php

namespace Xoptov\DynamicFormBundle\Entity;

use Xoptov\DynamicFormBundle\Model\FormOption as BaseFormOption;

abstract class FormOption extends BaseFormOption
{
    /** @var int */
    private $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}