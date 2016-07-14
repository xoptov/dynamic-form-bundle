<?php

namespace Xoptov\DynamicFormBundle\Model;

abstract class Form implements FormInterface
{
    /** @var mixed */
    protected $id;

    /** @var string */
    protected $type;

    /** @var string */
    protected $name;

    /** @var FieldInterface */
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
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
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
    public function setFields(array $fields)
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