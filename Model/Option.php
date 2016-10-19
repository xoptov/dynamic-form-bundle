<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\Collection;

abstract class Option implements OptionInterface
{
    use PolymorphicValueTrait;

    /** @var OptionInterface */
    protected $parent;

    /** @var string */
    protected $name;

    /** @var Collection */
    protected $children;

    /**
     * {@inheritdoc}
     */
    public function setParent(OptionInterface $option)
    {
        $this->parent = $option;

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
    public function addChildren(OptionInterface $option)
    {
        return $this->children->add($option);
    }

    /**
     * {@inheritdoc}
     */
    public function removeChildren(OptionInterface $option)
    {
        return $this->children->removeElement($option);
    }
}