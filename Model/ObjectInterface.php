<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\Collection;

interface ObjectInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param Collection $properties
     * @return ObjectInterface
     */
    public function setProperties(Collection $properties);

    /**
     * @return Collection
     */
    public function getProperties();

    /**
     * @param ObjectPropertyInterface $objectProperty
     * @return boolean
     */
    public function addProperty(ObjectPropertyInterface $objectProperty);

    /**
     * @param ObjectPropertyInterface $objectProperty
     * @return boolean
     */
    public function removeProperty(ObjectPropertyInterface $objectProperty);
}
