<?php

namespace Xoptov\DynamicFormBundle\Model;

abstract class ObjectProperty implements ObjectPropertyInterface
{
    /** @var ObjectInterface */
    protected $object;

    /** @var PropertyInterface */
    protected $property;

    /** @var bool */
    protected $valueBoolean;

    /** @var float */
    protected $valueFloat;

    /** @var string */
    protected $valueString;

    /** @var array */
    protected $valueCollection = array();

    /** @var int */
    protected $priority;

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
    public function setValueBoolean($value)
    {
        $this->eraseValues();
        $this->valueBoolean = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function setValueFloat($value)
    {
        $this->eraseValues();
        $this->valueFloat = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function setValueString($value)
    {
        $this->eraseValues();
        $this->valueString = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function setValueCollection(array $values)
    {
        $this->eraseValues();
        $this->valueCollection = $values;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        if (null == $value) {
            return false;
        }

        $values = explode(',', $value);

        if (count($values) > 1) {
            $this->setValueCollection($values);
        } elseif (0 === intval($value) || 1 === intval($value)) {
            $this->setValueBoolean($value);
        } elseif (floatval($value)) {
            $this->setValueFloat(floatval($value));
        } else {
            $this->setValueString($value);
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        if (count($this->valueCollection) > 0) {
            return $this->valueCollection;
        } elseif (null !== $this->valueBoolean) {
            return $this->valueBoolean;
        } elseif (null !== $this->valueFloat) {
            return $this->valueFloat;
        } elseif (null !== $this->valueString) {
            return $this->valueString;
        } else {
            return null;
        }
    }

    protected function eraseValues()
    {
        $this->valueFloat = null;
        $this->valueString = null;
        $this->valueCollection = array();
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
