<?php

namespace Xoptov\DynamicFormBundle\Model;

class Filter
{
    /** @var Field[] */
    private $fields = array();

    /**
     * @param Field $field
     * @return Filter
     */
    public function appendField(Field $field)
    {
        $this->fields[] = $field;
        
        return $this;
    }

    /**
     * @param string $key
     * @return Filter
     */
    public function removeField($key)
    {
        if (isset($this->fields[$key])) {
            unset($this->fields[$key]);
        }

        return $this;
    }

    /**
     * @return Field[]
     */
    public function getFields()
    {
        return $this->fields;
    }
}