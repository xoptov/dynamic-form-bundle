<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\Collection;

abstract class Form implements FormInterface, OptionsAwareInterface
{
    use OptionsAwareTrait;

    /** @var mixed */
    protected $id;

    /** @var string */
    protected $name;

    /** @var FormInterface */
    protected $parent;

    /** @var Collection */
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
    public function setParent(FormInterface $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * {@inheritdoc}
     */
    public function setFields(Collection $fields)
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
    public function addField(FieldInterface $field)
    {
        return $this->fields->add($field);
    }

    /**
     * {@inheritdoc}
     */
    public function removeField(FieldInterface $field)
    {
        return $this->fields->removeElement($field);
    }
}
