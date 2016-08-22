<?php

namespace Xoptov\DynamicFormBundle\Model;

abstract class Value implements ValueInterface
{
    /** @var mixed */
    protected $id;

    /** @var mixed */
    protected $value;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }
}
