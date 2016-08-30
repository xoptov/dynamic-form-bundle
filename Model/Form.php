<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

abstract class Form implements FormInterface, \ArrayAccess
{
    /** @var mixed */
    protected $id;

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

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        foreach ($this->fields as $field) {
            if ($field->getId() == $offset) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        foreach ($this->fields as $field) {
            if ($field->getId() == $offset) {
                return $field;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        foreach ($this->fields as $key => $field) {
            if ($field->getId() == $offset) {
                $this->fields[$key] = $value;
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        foreach ($this->fields as $key => $field) {
            if ($field->getId() == $offset) {
                unset($this->fields[$key]);
            }
        }
    }
}
