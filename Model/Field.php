<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\Extension\Core\Type\TextType;

abstract class Field implements FieldInterface
{
    /** @var mixed */
    protected $id;

    /** @var string */
    protected $class;

    /** @var PropertyInterface */
    protected $property;

    /** @var integer */
    protected $priority;

    /** @var ArrayCollection */
    protected $constraints;

    /** @var boolean */
    protected $enabled;

    /**
     * Field constructor.
     */
    public function __construct()
    {
        $this->class = TextType::class;
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
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getClass()
    {
        return $this->class;
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

    /**
     * {@inheritdoc}
     */
    public function setConstraints(array $constraints)
    {
        $this->constraints = $constraints;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getConstraints()
    {
        return $this->constraints;
    }

    /**
     * {@inheritdoc}
     */
    public function addConstraint(ConstraintInterface $constraint)
    {
        $this->constraints->add($constraint);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeConstraint(ConstraintInterface $constraint)
    {
        $this->constraints->removeElement($constraint);

        return $this;
    }

    /**
     * @param boolean $enabled
     * @return Field
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }
}