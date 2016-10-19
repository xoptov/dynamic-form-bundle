<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\Collection;

interface FormInterface
{
    /**
     * @return mixed
     */
    public function getId();

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
     * @param string $name
     * @return FormInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param Collection $fields
     * @return FormInterface
     */
    public function setFields(Collection $fields);

    /**
     * @return FieldInterface[]
     */
    public function getFields();

    /**
     * @param FieldInterface $field
     * @return boolean
     */
    public function addField(FieldInterface $field);

    /**
     * @param FieldInterface $field
     * @return boolean
     */
    public function removeField(FieldInterface $field);
}
