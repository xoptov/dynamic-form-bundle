<?php

namespace Xoptov\FilterBundle\Model;

class FieldLiteral extends Field
{
    /** @var string */
    private $value;

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}