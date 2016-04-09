<?php

namespace Xoptov\DynamicFormBundle\Model;

interface FormInterface
{
    /**
     * @return mixed
     */
    public function getId();

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
     * @param FieldInterface[] $fields
     * @return FormInterface
     */
    public function setFields($fields);

    /**
     * @return FieldInterface[]
     */
    public function getFields();
}