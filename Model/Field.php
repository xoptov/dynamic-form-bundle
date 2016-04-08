<?php

namespace Xoptov\DynamicFormBundle\Model;

class Field implements FieldInterface
{
    /** @var mixed */
    protected $id;

    /** @var string */
    protected $type;

    /** @var Form */
    protected $form;

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
    public function setForm(Form $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getForm()
    {
        return $this->form;
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