<?php

namespace Xoptov\DynamicFormBundle\Model;

abstract class ObjectProperty implements ObjectPropertyInterface
{
    /** @var string */
    protected $type;

    /** @var ObjectInterface */
    protected $object;

    /** @var PropertyInterface */
    protected $property;

    /** @var mixed */
    protected $value;

    /** @var int */
    protected $priority;

    /**
     * @param string $type
     * @return ObjectProperty
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param ObjectInterface $object
     * @return ObjectProperty
     */
    public function setObject(ObjectInterface $object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * @return ObjectInterface
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param PropertyInterface $property
     * @return ObjectProperty
     */
    public function setProperty(PropertyInterface $property)
    {
        $this->property = $property;

        return $this;
    }

    /**
     * @return PropertyInterface
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $priority
     * @return ObjectProperty
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }
}