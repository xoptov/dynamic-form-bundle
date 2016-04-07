<?php

namespace Xoptov\FilterBundle\Model;

class Filter
{
    /** @var mixed */
    protected $id;

    /** @var string */
    protected $name;

    /** @var mixed */
    protected $fields;

    /**
     * @param mixed $id
     * @return Filter
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $name
     * @return Filter
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $fields
     * @return Filter
     */
    public function setFields($fields)
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }
}