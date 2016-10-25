<?php

namespace Xoptov\DynamicFormBundle\DataStructure;

use Xoptov\DynamicFormBundle\Model\FormInterface;

class FormHeap extends \SplHeap
{
    /**
     * @param FormInterface $value1
     * @param FormInterface $value2
     * @return int
     */
    public function compare($value1, $value2)
    {
        if ($value1->getPriority() > $value2->getPriority()) {
            return 1;
        } else if ($value1->getPriority() < $value2->getPriority()) {
            return -1;
        }

        return 0;
    }
}