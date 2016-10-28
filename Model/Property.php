<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

abstract class Property implements PropertyInterface
{
    /** @var mixed */
    protected $id;

    /** @var string */
    protected $name;

    /** @var MeasureInterface */
    protected $measure;

    /** @var Collection */
    protected $values;

    /**
     * Property constructor.
     */
    public function __construct()
    {
        $this->values = new ArrayCollection();
    }

    /**
     * @return mixed
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
    public function setMeasure(MeasureInterface $measure)
    {
        $this->measure = $measure;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * {@inheritdoc}
     */
    public function setValues(Collection $values)
    {
        $this->values = $values;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * {@inheritdoc}
     */
    public function addValue(ValueInterface $value)
    {
        return $this->values->add($value);
    }

    /**
     * {@inheritdoc}
     */
    public function removeValue(ValueInterface $value)
    {
        return $this->values->removeElement($value);
    }
}
