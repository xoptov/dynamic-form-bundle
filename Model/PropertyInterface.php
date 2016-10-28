<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\Collection;

interface PropertyInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $name
     * @return mixed
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param MeasureInterface $measure
     * @return PropertyInterface
     */
    public function setMeasure(MeasureInterface $measure);

    /**
     * @return MeasureInterface
     */
    public function getMeasure();

    /**
     * @param Collection $values
     * @return PropertyInterface
     */
    public function setValues(Collection $values);

    /**
     * @return Collection
     */
    public function getValues();

    /**
     * @param ValueInterface $value
     * @return bool
     */
    public function addValue(ValueInterface $value);

    /**
     * @param ValueInterface $value
     * @return bool
     */
    public function removeValue(ValueInterface $value);
}
