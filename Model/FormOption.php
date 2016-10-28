<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

abstract class FormOption implements FormOptionInterface
{
    use PolymorphicValueTrait;

    /** @var OptionInterface */
    protected $option;

    /** @var Collection */
    protected $children;

    /**
     * FormOption constructor.
     */
    public function __construct()
    {
        $this->valueCollection = new ArrayCollection();
        $this->option = new ArrayCollection();
        $this->children = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function setOption(OptionInterface $option)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOption()
    {
        return $this->option;
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
    public function addChildren(FormOptionInterface $child)
    {
        return $this->children->add($child);
    }

    /**
     * {@inheritdoc}
     */
    public function removeChildren(FormOptionInterface $child)
    {
        return $this->children->removeElement($child);
    }
}