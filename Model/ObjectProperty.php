<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

abstract class ObjectProperty extends PolymorphicValueAware implements ObjectPropertyInterface
{
    /** @var ObjectInterface */
    protected $object;

    /** @var PropertyInterface */
    protected $property;

    /** @var int */
    protected $priority;

    /** @var ArrayCollection */
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
     * @todo need refactoring
     */
    public function addValue(Value $value)
    {
        $this->eraseValues();
        $this->valueCollection->add($value);
    }

    /**
     * {@inheritdoc}
     * @todo need refactoring
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
     * @todo need refactoring
     */
    public function getValue()
    {
        if (!$this->valueCollection->isEmpty()) {
            return $this->valueCollection;
        } else {
            return parent::getValue();
        }
    }

    /**
     * @todo need refactoring
     */
    protected function eraseValues()
    {
        parent::eraseValues();

        $this->valueCollection->clear();
    }
}
