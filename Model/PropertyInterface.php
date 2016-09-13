<?php

namespace Xoptov\DynamicFormBundle\Model;

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
     * @return mixed
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
}
