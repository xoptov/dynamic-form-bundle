<?php

namespace Xoptov\DynamicFormBundle\Model;

abstract class PolymorphicValueAware
{
    /** @var bool */
    protected $valueBoolean;

    /** @var int */
    protected $valueInteger;

    /** @var float */
    protected $valueFloat;

    /** @var string */
    protected $valueString;

    /** @var ValueInterface */
    protected $valueObject;

    /**
     * @param boolean $value
     */
    public function setValueBoolean($value)
    {
        $this->eraseValues();
        $this->valueBoolean = $value;
    }

    /**
     * @param int $value
     */
    public function setValueInteger($value)
    {
        $this->eraseValues();
        $this->valueInteger = $value;
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
     * @param ValueInterface $value
     */
    public function setValueObject(ValueInterface $value)
    {
        $this->eraseValues();
        $this->valueObject = $value;
    }

    /**
     * @param mixed $value
     * @return boolean
     */
    public function setValue($value)
    {
        if (null === $value) {
            $this->eraseValues();

            return false;
        }

        if ($value instanceof ValueInterface) {
            $this->setValueObject($value);
        } elseif (is_string($value)) {
            $this->setValueString($value);
        } elseif (is_integer($value) && ($value !== true || $value !== false)){
            $this->setValueInteger($value);
        } elseif (is_float($value)) {
            $this->setValueFloat(floatval($value));
        } else {
            $this->setValueBoolean($value);
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        if ($this->valueObject instanceof ValueInterface){
            return $this->valueObject;
        } elseif (null !== $this->valueInteger) {
            return $this->valueInteger;
        } elseif (null !== $this->valueFloat) {
            return $this->valueFloat;
        } elseif (null !== $this->valueString) {
            return $this->valueString;
        } elseif (null !== $this->valueBoolean) {
            return $this->valueBoolean;
        } else {
            return null;
        }
    }

    protected function eraseValues()
    {
        $this->valueBoolean = null;
        $this->valueInteger = null;
        $this->valueFloat = null;
        $this->valueString = null;
        $this->valueObject = null;
    }
}