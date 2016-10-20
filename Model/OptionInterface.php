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
     * @param boolean|float|string|array $value
     * @return mixed
     */
    public function setValue($value);

    /**
     * @return boolean|float|string|array
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