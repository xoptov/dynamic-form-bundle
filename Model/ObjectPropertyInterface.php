<?php

namespace Xoptov\DynamicFormBundle\Model;

interface ObjectPropertyInterface
{
    /**
     * @param string $type
     * @return ObjectPropertyInterface
     */
    public function setType($type);

    /**
     * @return mixed
     */
    public function getType();

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
     * @param ValueInterface[] $values
     * @return ObjectPropertyInterface
     */
    public function setValues(array $values);

    /**
     * @return ValueInterface[]
     */
    public function getValues();
}
