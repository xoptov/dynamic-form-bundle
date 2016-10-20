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
    protected $valueSet = array();

    /**
     * @param boolean $value
     */
    public function setValueBoolean($value)
    {
        $this->eraseValues();
        $this->valueBoolean = $value;
    }

    /**
     * @param float $value
     */
    public function setValueFloat($value)
    {
        $this->eraseValues();
        $this->valueFloat = $value;
    }

    /**
     * @param string $value
     */
    public function setValueString($value)
    {
        $this->eraseValues();
        $this->valueString = $value;
    }

    /**
     * @param array $values
     */
    public function setValueSet(array $values)
    {
        $this->eraseValues();
        $this->valueSet = $values;
    }

    /**
     * @param mixed $value
     * @return boolean
     */
    public function setValue($value)
    {
        if (null == $value) {
            $this->eraseValues();

            return false;
        }

        $values = explode(',', $value);

        if (count($values) > 1) {
            $this->setValueSet($values);
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
     * @return mixed
     */
    public function getValue()
    {
        if (count($this->valueSet) > 0) {
            return $this->valueSet;
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
        $this->valueSet = array();
    }
}