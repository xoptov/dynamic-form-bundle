<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\Collection;

interface FormOptionInterface
{
    /**
     * @param OptionInterface $option
     * @return FormOptionInterface
     */
    public function setOption(OptionInterface $option);

    /**
     * @return OptionInterface
     */
    public function getOption();

    /**
     * @param mixed $value
     * @return boolean
     */
    public function setValue($value);

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @param Collection $children
     * @return FormOptionInterface
     */
    public function setChildren(Collection $children);

    /**
     * @return Collection
     */
    public function getChildren();

    /**
     * @param FormOptionInterface $child
     * @return boolean
     */
    public function addChildren(FormOptionInterface $child);

    /**
     * @param FormOptionInterface $child
     * @return boolean
     */
    public function removeChildren(FormOptionInterface $child);
}