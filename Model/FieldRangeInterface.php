<?php

namespace Xoptov\DynamicFormBundle\Model;

interface FieldRangeInterface extends FieldInterface
{
    /**
     * @param float $value
     * @return FieldRangeInterface
     */
    public function setFrom($value);

    /**
     * @return float
     */
    public function getFrom();

    /**
     * @param float $value
     * @return FieldRangeInterface
     */
    public function setTo($value);

    /**
     * @return float
     */
    public function getTo();
}