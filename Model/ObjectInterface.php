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
}
