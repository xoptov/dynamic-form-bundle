<?php

namespace Xoptov\DynamicFormBundle\Model;

interface OptionInterface
{
    /**
     * @return mixed
     */
    public function getId();

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
     * @param string $description
     * @return OptionInterface
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getDescription();
}