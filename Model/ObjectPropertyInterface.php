<?php

namespace Xoptov\DynamicFormBundle\Model;

interface ObjectPropertyInterface
{
    /**
     * @param ObjectInterface $object
     * @return ObjectPropertyInterface
     */
    public function setObject(ObjectInterface $object);

    /**
     * @return ObjectInterface
     */
    public function getObject();

    /**
     * @param PropertyInterface $property
     * @return ObjectPropertyInterface
     */
    public function setProperty(PropertyInterface $property);

    /**
     * @return PropertyInterface
     */
    public function getProperty();

    /**
     * @param int $priority
     * @return ObjectPropertyInterface
     */
    public function setPriority($priority);

    /**
     * @return int
     */
    public function getPriority();

    /**
     * @param boolean|float|string|array $value
     * @return mixed
     */
    public function setValue($value);

    /**
     * @return boolean|float|string|array
     */
    public function getValue();
}
