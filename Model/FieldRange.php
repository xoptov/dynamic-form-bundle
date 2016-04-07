<?php

namespace Xoptov\FilterBundle\Model;

class FieldRange extends AbstractField
{
    /** @var float */
    private $valueFrom;

    /** @var float */
    private $valueTo;

    /**
     * @param float $value
     * @return FieldRange
     */
    public function setValueFrom($value)
    {
        $this->valueFrom = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getValueFrom()
    {
        return $this->valueFrom;
    }

    /**
     * @param float $value
     * @return FieldRange
     */
    public function setValueTo($value)
    {
        $this->valueTo = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getValueTo()
    {
        return $this->valueTo;
    }
}