<?php

namespace Xoptov\DynamicFormBundle\Model;

use Doctrine\Common\Collections\Collection;

trait OptionsAwareTrait
{
    /** @var Collection */
    protected $options;

    /**
     * {@inheritdoc}
     */
    public function setOptions(Collection $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * {@inheritdoc}
     */
    public function addOption(OptionInterface $option)
    {
        return $this->options->add($option);
    }

    /**
     * {@inheritdoc}
     */
    public function removeOption(OptionInterface $option)
    {
        return $this->options->removeElement($option);
    }
}