<?php

namespace Xoptov\DynamicFormBundle\Entity;

use Xoptov\DynamicFormBundle\Model\FieldOption as BaseFieldOption;

abstract class FieldOption extends BaseFieldOption
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