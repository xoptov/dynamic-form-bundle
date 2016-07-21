<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

abstract class Form implements FormInterface
{
    /** @var mixed */
    protected $id;

    /** @var string */
    protected $type;

    /** @var string */
    protected $name;

    /** @var FormInterface */
    protected $parent;

    /** @var FieldInterface[] */
    protected $fields;

    /**
     * Form constructor.
     */
    public function __construct()
    {
        $this->fields = new ArrayCollection();
    }

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
     * @param FormInterface $parent
     * @return Form
     */
    public function setParent(FormInterface $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return FormInterface
     */
    public function getParent()
    {
        return $this->parent;
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