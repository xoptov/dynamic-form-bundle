<?php

namespace Xoptov\FilterBundle\Model;

class FieldSet extends Field
{
    /** @var array */
    private $valueSet;

    /**
     * @param array $values
     */
    public function setValueSet(array $values)
    {
        $this->valueSet = $values;
    }

    /**
     * @return array
     */
    public function getValueSet()
    {
        return $this->valueSet;
    }
}