<?php

namespace Xoptov\DynamicFormBundle\Model;

interface PropertyInterface
{
    /**
     * @param $id
     * @return PropertyInterface
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $name
     * @return mixed
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param int $priority
     * @return PropertyInterface
     */
    public function setPriority($priority);

    /**
     * @return int
     */
    public function getPriority();
}