<?php

namespace Xoptov\DynamicFormBundle\Model;

abstract class Constraint implements ConstraintInterface
{
    /** @var string */
    protected $class;
    
    /** @var array */
    protected $settings;

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
    public function setSettings(array $settings)
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSettings()
    {
        return $this->settings;
    }
}