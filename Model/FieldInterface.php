<?php

namespace Xoptov\DynamicFormBundle\Model;

interface FieldInterface
{
    /**
     * @param mixed $id
     * @return FieldInterface
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $type
     * @return FieldInterface
     */
    public function setType($type);

    /**
     * @return string
     */
    public function getType();

    /**
     * @param Form $form
     * @return FieldInterface
     */
    public function setForm(Form $form);

    /**
     * @return Form
     */
    public function getForm();

    /**
     * @param PropertyInterface $property
     * @return FieldInterface
     */
    public function setProperty(PropertyInterface $property);

    /**
     * @return PropertyInterface
     */
    public function getProperty();

    /**
     * @param string $formType
     * @return FieldInterface
     */
    public function setFormType($formType);

    /**
     * @return string
     */
    public function getFormType();

    /**
     * @param int $priority
     * @return FieldInterface
     */
    public function setPriority($priority);

    /**
     * @return int
     */
    public function getPriority();
}