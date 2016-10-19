<?php

namespace Xoptov\DynamicFormBundle\Model;

interface FieldInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $label
     * @return FieldInterface
     */
    public function setLabel($label);

    /**
     * @return string
     */
    public function getLabel();

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
     * @param string $description
     * @return FieldInterface
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param boolean $value
     * @return FieldInterface
     */
    public function setEnabled($value);

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
