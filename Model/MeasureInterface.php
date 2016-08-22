<?php

namespace Xoptov\DynamicFormBundle\Model;

interface MeasureInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $name
     * @return MeasureInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $label
     * @return MeasureInterface
     */
    public function setLabel($label);

    /**
     * @return string
     */
    public function getLabel();
}
