<?php

namespace Xoptov\DynamicFormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Xoptov\DynamicFormBundle\Form\EventListener\FilterTypeSubscriber;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Xoptov\DynamicFormBundle\Model\Filter;

class FilterType extends AbstractType
{
    /** @var FilterTypeSubscriber */
    protected $filterSubscriber;

    /**
     * FilterType constructor.
     * @param FilterTypeSubscriber $filterSubscriber
     */
    public function __construct(FilterTypeSubscriber $filterSubscriber)
    {
        $this->filterSubscriber = $filterSubscriber;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventSubscriber($this->filterSubscriber);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Filter::class
        ));
    }
}
