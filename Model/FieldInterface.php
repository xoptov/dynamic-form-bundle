<?php

namespace Xoptov\DynamicFormBundle\Model;

interface FieldInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $class
     * @return FieldInterface
     */
    public function setClass($class);

    /**
     * @return string
     */
    public function getClass();

    /**
     * @param PropertyInterface $property
     * @return FieldInterface
     */
    public function setProperty(PropertyInterface $property);

    /**
     * @return PropertyInterface
     */
    public function getProperty();

    /**
     * @param int $priority
     * @return FieldInterface
     */
    public function setPriority($priority);

    /**
     * @return int
     */
    public function getPriority();

    /**
     * @param array $options
     * @return FieldInterface
     */
    public function setOptions(array $options);

    /**
     * @return array
     */
    public function getOptions();

    /**
     * @param boolean $enabled
     * @return FieldInterface
     */
    public function setEnabled($enabled);

    /**
     * @return boolean
     */
    public function isEnabled();

    /**
     * @param mixed $value
     * @return FieldInterface
     */
    public function setValue($value);

    /**
     * @return mixed
     */
    public function getValue();
}