<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\Extension\Core\Type\FormType;

abstract class Form implements FormInterface
{
    /** @var mixed */
    protected $id;

    /** @var string */
    protected $type = self::TYPE_FORM;

    /** @var FormInterface */
    protected $parent;

    /** @var string */
    protected $name;

    /** @var string */
    protected $class = FormType::class;

    /** @var string */
    protected $description;

    /** @var PropertyInterface */
    protected $property;

    /** @var int */
    protected $priority;

    /** @var Collection */
    protected $options;

    /** @var Collection */
    protected $children;

    /** @var boolean */
    protected $enabled;

    /**
     * Form constructor.
     */
    public function __construct()
    {
        $this->options = new ArrayCollection();
        $this->children = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $type
     * @return Form
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
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
    public function getPriority()
    {
        return $this->priority;
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
    public function setOptions(Collection $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * {@inheritdoc}
     */
    public function addOption(FormOptionInterface $option)
    {
        return $this->options->add($option);
    }

    /**
     * {@inheritdoc}
     */
    public function removeOption(FormOptionInterface $option)
    {
        return $this->options->removeElement($option);
    }

    /**
     * {@inheritdoc}
     */
    public function setChildren(Collection $children)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * {@inheritdoc}
     */
    public function addChildren(FormInterface $child)
    {
        return $this->children->add($child);
    }

    /**
     * {@inheritdoc}
     */
    public function removeChildren(FormInterface $child)
    {
        return $this->children->removeElement($child);
    }

    /**
     * {@inheritdoc}
     */
    public function setEnabled($value)
    {
        $this->enabled = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * {@inheritdoc}
     */
    public function isForm()
    {
        return $this->type == self::TYPE_FORM;
    }

    /**
     * {@inheritdoc}
     */
    public function isField()
    {
        return $this->type == self::TYPE_FIELD;
    }
}
