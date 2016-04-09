<?php

namespace Xoptov\DynamicFormBundle\Entity;

use Xoptov\DynamicFormBundle\Model\FormInterface;

abstract class AbstractForm implements FormInterface
{
    /** @var mixed */
    protected $id;

    /** @var string */
    protected $name;

    /** @var mixed */
    protected $fields;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setFields($fields)
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return $this->fields;
    }
}