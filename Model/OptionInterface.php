<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\Collection;

interface OptionInterface
{
    /**
     * @param OptionInterface $option
     * @return OptionInterface
     */
    public function setParent(OptionInterface $option);

    /**
     * @return OptionInterface
     */
    public function getParent();

    /**
     * @param string $name
     * @return OptionInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param boolean $value
     * @return OptionInterface
     */
    public function setValueBoolean($value);

    /**
     * @param float $value
     * @return OptionInterface
     */
    public function setValueFloat($value);

    /**
     * @param string $value
     * @return OptionInterface
     */
    public function setValueString($value);

    /**
     * @param array $values
     * @return OptionInterface
     */
    public function setValueArray(array $values);

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @param Collection $children
     * @return OptionInterface
     */
    public function setChildren(Collection $children);

    /**
     * @return Collection
     */
    public function getChildren();

    /**
     * @param OptionInterface $option
     * @return boolean
     */
    public function addChildren(OptionInterface $option);

    /**
     * @param OptionInterface $option
     * @return boolean
     */
    public function removeChildren(OptionInterface $option);
}