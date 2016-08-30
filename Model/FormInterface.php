<?php

namespace Xoptov\DynamicFormBundle\Model;

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
     * @param FieldInterface[] $fields
     * @return FormInterface
     */
    public function setFields(array $fields);

    /**
     * @return FieldInterface[]
     */
    public function getFields();
}
