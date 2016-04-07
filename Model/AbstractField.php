<?php

namespace Xoptov\FilterBundle\Model;

abstract class AbstractField implements FieldInterface
{
    /** @var mixed */
    protected $id;

    /** @var string */
    protected $type;

    /** @var Filter */
    protected $filter;

    /** @var PropertyInterface */
    protected $property;

    /** @var string */
    protected $formType;
    
    /** @var int */
    protected $priority;

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
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        $this->type = $type;
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
    public function setFilter(Filter $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * {@inheritdoc}
     */
    public function setProperty(PropertyInterface $property)
    {
        $this->property = $property;

        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * {@inheritdoc}
     */
    public function setFormType($formType)
    {
        $this->formType = $formType;

        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getFormType()
    {
        return $this->formType;
    }

    /**
     * {@inheritdoc}
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        return $this->priority;
    }
}