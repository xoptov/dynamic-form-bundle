<?php

namespace Xoptov\DynamicFormBundle\Model;

interface ValueInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param mixed $value
     * @return ValueInterface
     */
    public function setValue($value);

    /**
     * @return mixed
     */
    public function getValue();
}
