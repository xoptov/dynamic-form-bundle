<?php

namespace Xoptov\DynamicFormBundle\Model;

interface FieldOptionInterface extends OptionInterface
{
    /**
     * @param FieldInterface $field
     * @return FieldOptionInterface
     */
    public function setField(FieldInterface $field);

    /**
     * @return FieldInterface
     */
    public function getField();
}