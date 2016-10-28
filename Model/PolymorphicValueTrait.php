<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\Collection;

trait PolymorphicValueTrait
{
    /** @var bool */
    protected $valueBoolean;

    /** @var int */
    protected $valueInteger;

    /** @var float */
    protected $valueFloat;

    /** @var string */
    protected $valueString;

    /** @var array */
    protected $valueArray = array();

    /** @var Collection */
    protected $valueCollection;

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
     * @param array $values
     */
    public function setValueArray(array $values)
    {
        $this->eraseValues();
        $this->valueArray = $values;
    }

    /**
     * @param Collection $values
     */
    public function setValueCollection(Collection $values)
    {
        $this->eraseValues();
        $this->values = $values;
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

        if ($value instanceof Collection) {
            $this->setValueCollection($value);
        } elseif (is_array($value)) {
            $this->setValueArray($value);
        } elseif (is_bool($value)) {
            $this->setValueBoolean($value);
        } elseif (is_integer($value)){
            $this->setValueInteger($value);
        } elseif (is_float($value)) {
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
        if ($this->valueCollection->count()) {
            return $this->valueCollection;
        } elseif (count($this->valueArray)){
            return $this->valueArray;
        } elseif (null !== $this->valueBoolean) {
            return $this->valueBoolean;
        } elseif (null != $this->valueInteger) {
            return $this->valueInteger;
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
        $this->valueInteger = null;
        $this->valueFloat = null;
        $this->valueString = null;
        $this->valueArray = array();
        $this->valueCollection->clear();
    }
}