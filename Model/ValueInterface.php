<?php

namespace Xoptov\DynamicFormBundle\Model;

interface ValueInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param Value $value
     * @return ValueInterface
     */
    public function setParent(Value $value);

    /**
     * @return ValueInterface
     */
    public function getParent();

    /**
     * @param PropertyInterface $property
     * @return ValueInterface
     */
    public function setProperty(PropertyInterface $property);

    /**
     * @return Property
     */
    public function getProperty();

    /**
     * @param string $value
     * @return ValueInterface
     */
    public function setLabel($value);

    /**
     * @return string
     */
    public function getLabel();
}