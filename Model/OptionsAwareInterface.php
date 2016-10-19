<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\Collection;

interface OptionsAwareInterface
{
    /**
     * @param Collection $options
     * @return FormInterface
     */
    public function setOptions(Collection $options);

    /**
     * @return Collection
     */
    public function getOptions();

    /**
     * @param OptionInterface $option
     * @return boolean
     */
    public function addOption(OptionInterface $option);

    /**
     * @param OptionInterface $option
     * @return boolean
     */
    public function removeOption(OptionInterface $option);
}