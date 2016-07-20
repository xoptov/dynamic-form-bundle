<?php

namespace Xoptov\DynamicFormBundle\Model;

interface FieldSetInterface extends FieldInterface
{
    /**
     * @param array $values
     * @return FieldSetInterface
     */
    public function setValues(array $values);

    /**
     * @return array
     */
    public function getValues();
}