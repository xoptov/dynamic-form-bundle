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
     * @param float $value
     * @return ObjectPropertyInterface
     */
    public function setValueFloat($value);

    /**
     * @param string $value
     * @return ObjectPropertyInterface
     */
    public function setValueString($value);

    /**
     * @param array $values
     * @return ObjectPropertyInterface
     */
    public function setValueCollection(array $values);

    /**
     * @return mixed
     */
    public function getValue();
}
