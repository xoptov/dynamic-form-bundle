<?php

namespace Xoptov\DynamicFormBundle\Entity;

use Xoptov\DynamicFormBundle\Model\ObjectProperty as BaseObjectProperty;

abstract class ObjectProperty extends BaseObjectProperty
{
    /** @var integer */
    protected $id;

    /**
     * @param int $id
     * @return ObjectProperty
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
