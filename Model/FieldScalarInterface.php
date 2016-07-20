<?php

namespace Xoptov\DynamicFormBundle\Model;

interface FieldScalarInterface extends FieldInterface
{
    /**
     * @param mixed $value
     * @return FieldScalarInterface
     */
    public function setValue($value);

    /**
     * @return mixed
     */
    public function getValue();
}