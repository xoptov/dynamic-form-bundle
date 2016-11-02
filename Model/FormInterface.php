<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\Collection;

interface FormInterface
{
    const TYPE_FORM = 'form';
    const TYPE_FIELD = 'field';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $type
     * @return FormInterface
     */
    public function setType($type);

    /**
     * @return string
     */
    public function getType();

    /**
     * @param FormInterface $parent
     * @return FormInterface
     */
    public function setParent(FormInterface $parent);

    /**
     * @return FormInterface
     */
    public function getParent();

    /**
     * @param string $title
     * @return FormInterface
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $name
     * @return FormInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $class
     * @return FormInterface
     */
    public function setClass($class);

    /**
     * @return string
     */
    public function getClass();

    /**
     * @param string $description
     * @return FormInterface
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param PropertyInterface $property
     * @return FormInterface
     */
    public function setProperty(PropertyInterface $property);

    /**
     * @return PropertyInterface
     */
    public function getProperty();

    /**
     * @param int $priority
     * @return FormInterface
     */
    public function setPriority($priority);

    /**
     * @return int
     */
    public function getPriority();

    /**
     * @param Collection $options
     * @return FormInterface
     */
    public function setOptions(Collection $options);

    /**
     * @return Collection
     */
    public function getOptions();

    /**
     * @param FormOptionInterface $option
     * @return boolean
     */
    public function addOption(FormOptionInterface $option);

    /**
     * @param FormOptionInterface $option
     * @return boolean
     */
    public function removeOption(FormOptionInterface $option);

    /**
     * @param Collection $children
     * @return FormInterface
     */
    public function setChildren(Collection $children);

    /**
     * @return Collection
     */
    public function getChildren();

    /**
     * @param FormInterface $child
     * @return boolean
     */
    public function addChildren(FormInterface $child);

    /**
     * @param FormInterface $child
     * @return boolean
     */
    public function removeChildren(FormInterface $child);

    /**
     * @param boolean $value
     * @return FormInterface
     */
    public function setEnabled($value);

    /**
     * @return boolean
     */
    public function isEnabled();

    /**
     * @return boolean
     */
    public function isForm();

    /**
     * @return boolean
     */
    public function isField();
}
