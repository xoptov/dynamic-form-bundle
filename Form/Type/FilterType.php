<?php

namespace Xoptov\DynamicFormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Xoptov\DynamicFormBundle\Form\EventListener\FilterTypeSubscriber;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Xoptov\DynamicFormBundle\Model\Form;

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
        $builder
            ->add('save', SubmitType::class, array('label' => 'Фильтровать'))
            ->add('reset', ResetType::class, array('label' => 'Сбрсить'));

        $builder->addEventSubscriber($this->filterSubscriber);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Form::class
        ));
    }
}