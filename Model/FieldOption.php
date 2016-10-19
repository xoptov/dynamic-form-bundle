<?php

namespace Xoptov\DynamicFormBundle\Model;

abstract class FieldOption extends Option implements FieldOptionInterface
{
    /** @var FieldInterface */
    protected $field;

    /**
     * {@inheritdoc}
     */
    public function setField(FieldInterface $field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getField()
    {
        return $this->field;
    }
}