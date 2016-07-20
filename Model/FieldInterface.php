<?php

namespace Xoptov\DynamicFormBundle\Model;

interface FieldInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $class
     * @return FieldInterface
     */
    public function setClass($class);

    /**
     * @return string
     */
    public function getClass();

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
     * @param int $priority
     * @return FieldInterface
     */
    public function setPriority($priority);

    /**
     * @return int
     */
    public function getPriority();

    /**
     * @param ConstraintInterface[] $constraints
     * @return FieldInterface
     */
    public function setConstraints(array $constraints);

    /**
     * @return ConstraintInterface[]
     */
    public function getConstraints();

    /**
     * @param ConstraintInterface $constraint
     * @return FieldInterface
     */
    public function addConstraint(ConstraintInterface $constraint);

    /**
     * @param ConstraintInterface $constraint
     * @return FieldInterface
     */
    public function removeConstraint(ConstraintInterface $constraint);
}