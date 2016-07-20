<?php

namespace Xoptov\DynamicFormBundle\Model;

interface ConstraintInterface
{
    /**
     * @param string $class
     * @return ConstraintInterface
     */
    public function setClass($class);

    /**
     * @return string
     */
    public function getClass();

    /**
     * @param array $settings
     * @return ConstraintInterface
     */
    public function setSettings(array $settings);

    /**
     * @return array
     */
    public function getSettings();
}