<?php

namespace Xoptov\DynamicFormBundle\Model;

interface ValueInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $value
     * @return ValueInterface
     */
    public function setLabel($value);

    /**
     * @return string
     */
    public function getLabel();

    /**
     * @param PropertyInterface $property
     * @return ValueInterface
     */
    public function setProperty(PropertyInterface $property);

    /**
     * @return Property
     */
    public function getProperty();
}