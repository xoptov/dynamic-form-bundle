<?php

namespace Xoptov\DynamicFormBundle\Model;

interface ObjectInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param ObjectPropertyInterface[] $properties
     * @return mixed
     */
    public function setProperties($properties);

    /**
     * @return ObjectPropertyInterface[]
     */
    public function getProperties();
}
