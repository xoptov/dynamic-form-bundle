<?php

namespace Xoptov\DynamicFormBundle\Model;

trait PolymorphicValueTrait
{
    /** @var bool */
    protected $valueBoolean;

    /** @var float */
    protected $valueFloat;

    /** @var string */
    protected $valueString;

    /** @var array */
    protected $valueArray = array();

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
    public function setValueArray(array $values)
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
            $this->setValueArray($values);
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
        if (count($this->valueArray) > 0) {
            return $this->valueArray;
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

    private function eraseValues()
    {
        $this->valueBoolean = null;
        $this->valueFloat = null;
        $this->valueString = null;
        $this->valueArray = array();
    }
}