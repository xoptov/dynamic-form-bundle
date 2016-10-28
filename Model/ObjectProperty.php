<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

abstract class ObjectProperty implements ObjectPropertyInterface
{
    use PolymorphicValueTrait;

    /** @var ObjectInterface */
    protected $object;

    /** @var PropertyInterface */
    protected $property;

    /** @var int */
    protected $priority;

    /**
     * ObjectProperty constructor.
     */
    public function __construct()
    {
        $this->valueCollection = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function setObject(ObjectInterface $object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * {@inheritdoc}
     */
    public function setProperty(PropertyInterface $property)
    {
        $this->property = $property;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * {@inheritdoc}
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        return $this->priority;
    }
}
