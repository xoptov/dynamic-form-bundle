<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

abstract class ObjectProperty extends PolymorphicValueAware implements ObjectPropertyInterface
{
    /** @var ObjectInterface */
    protected $object;

    /** @var PropertyInterface */
    protected $property;

    /** @var int */
    protected $priority;

    /** @var Collection */
    protected $valueCollection;

    /**
     * PolymorphicValueAware constructor.
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

    /**
     * @param Value $value
     */
    public function addValue(Value $value)
    {
        $this->eraseValues();
        $this->valueCollection->add($value);
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        if ($value instanceof Value) {
            $this->addValue($value);
            return true;
        } else {
            return parent::setValue($value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        if (!$this->valueCollection->isEmpty()) {
            return $this->valueCollection;
        } else {
            return parent::getValue();
        }
    }

    protected function eraseValues()
    {
        parent::eraseValues();

        $this->valueCollection->clear();
    }
}
