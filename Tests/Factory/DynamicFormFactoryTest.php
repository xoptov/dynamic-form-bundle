<?php

namespace Xoptov\DynamicFormBundle\Tests\Factory;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormFactoryInterface;
use Xoptov\DynamicFormBundle\DataStructure\FormHeap;
use Xoptov\DynamicFormBundle\Entity\Form;
use Xoptov\DynamicFormBundle\Entity\Option;
use Xoptov\DynamicFormBundle\Entity\FormOption;
use Xoptov\DynamicFormBundle\Entity\Value;
use Xoptov\DynamicFormBundle\Model\FormInterface;
use Xoptov\DynamicFormBundle\Model\ObjectInterface;
use Xoptov\DynamicFormBundle\Factory\DynamicFormFactory;

class DynamicFormFactoryTest extends KernelTestCase
{
    /** @var FormInterface */
    private $firstForm;

    /** @var FormInterface */
    private $secondForm;

    /** @var FormFactoryInterface */
    private static $formFactory;

    public static function setUpBeforeClass()
    {
        static::bootKernel();
        static::$formFactory = static::$kernel->getContainer()->get('form.factory');
    }

    public function setUp()
    {
        // Prepare first form description.

        $this->firstForm = new Form();
        $this->firstForm->setName('transport');

        // Prepare fields for description.

        $field = new Form();
        $field
            ->setType(FormInterface::TYPE_FIELD)
            ->setName('fuelType')
            ->setClass(EntityType::class)
            ->setPriority(2048)
            ->setEnabled(true);

        $option = new Option();
        $option->setName('class');

        $formOption = new FormOption();
        $formOption
            ->setForm($field)
            ->setOption($option)
            ->setValue(Value::class);

        $field->addOption($formOption);
        $this->firstForm->addChildren($field);

        $field = new Form();
        $field
            ->setType(FormInterface::TYPE_FIELD)
            ->setName('enginePower')
            ->setClass(NumberType::class)
            ->setPriority(1024)
            ->setEnabled(true);

        $this->firstForm->addChildren($field);

        $field = new Form();
        $field
            ->setType(FormInterface::TYPE_FIELD)
            ->setName('engineVolume')
            ->setClass(NumberType::class)
            ->setPriority(512)
            ->setEnabled(true);

        $this->firstForm->addChildren($field);

        // Prepare second form description.

        $this->secondForm = new Form();
        $this->secondForm->setName('cars');

        // Prepare options for description.

        $option = new Option();
        $option->setName('data_class');

        $formOption = new FormOption();
        $formOption
            ->setForm($this->secondForm)
            ->setOption($option)
            ->setValue(ObjectInterface::class);
        $this->secondForm->addOption($formOption);

        $option = new Option();
        $option->setName('compound');

        $formOption = new FormOption();
        $formOption
            ->setForm($this->secondForm)
            ->setOption($option)
            ->setValue(true);
        $this->secondForm->addOption($formOption);

        // Prepare fields for description.

        $field = new Form();
        $field
            ->setType(FormInterface::TYPE_FIELD)
            ->setName('doors')
            ->setClass(ChoiceType::class)
            ->setPriority(256)
            ->setEnabled(true);

        $option = new Option();
        $option->setName('choices');

        $formOption = new FormOption();
        $formOption
            ->setForm($field)
            ->setOption($option)
            ->setValue(array(
                'select.option.yes' => true,
                'select.option.no' => false
            ));

        $this->secondForm->addChildren($field);

        $field = new Form();
        $field
            ->setType(FormInterface::TYPE_FIELD)
            ->setName('transmission')
            ->setClass(EntityType::class)
            ->setPriority(128)
            ->setEnabled(true);

        $option = new Option();
        $option->setName('class');

        $formOption = new FormOption();
        $formOption
            ->setForm($field)
            ->setOption($option)
            ->setValue(Value::class);
        $field->addOption($formOption);
        $this->secondForm->addChildren($field);

        $field = new Form();
        $field
            ->setType(FormInterface::TYPE_FIELD)
            ->setName('gear')
            ->setClass(EntityType::class)
            ->setPriority(64)
            ->setEnabled(true);

        $option = new Option();
        $option->setName('class');

        $formOption = new FormOption();
        $formOption
            ->setForm($field)
            ->setOption($option)
            ->setValue(Value::class);
        $field->addOption($formOption);
        $this->secondForm->addChildren($field);

        $field = new Form();
        $field
            ->setType(FormInterface::TYPE_FIELD)
            ->setName('title')
            ->setClass(TextType::class)
            ->setPriority(4096)
            ->setEnabled(true);
        $this->secondForm->addChildren($field);

        $this->secondForm->setParent($this->firstForm);
    }

    public function testCreateOptions()
    {
        $dynamicFormFactory = new DynamicFormFactory($this->createMock(FormFactory::class));
        $reflection = new \ReflectionObject($dynamicFormFactory);
        $method = $reflection->getMethod('createOptions');
        $method->setAccessible(true);

        $createdOptions = $method->invoke($dynamicFormFactory, $this->secondForm);

        // Checking assertion

        $this->assertArrayHasKey('data_class', $createdOptions);
        if (array_key_exists('data_class', $createdOptions)) {
            $this->assertEquals(ObjectInterface::class, $createdOptions['data_class']);
        }

        $this->assertArrayHasKey('compound', $createdOptions);
        if (array_key_exists('compound', $createdOptions)) {
            $this->assertTrue($createdOptions['compound']);
        }
    }

    public function testAppendFieldsWithoutInheritance()
    {

        $formBuilder = static::$formFactory->createBuilder();

        $dynamicFormFactory = new DynamicFormFactory(static::$formFactory);
        $reflection = new \ReflectionObject($dynamicFormFactory);
        $method = $reflection->getMethod('appendFields');
        $method->setAccessible(true);

        $method->invoke($dynamicFormFactory, $formBuilder, $this->firstForm);

        $form = $formBuilder->getForm();

        $this->assertTrue($form->isSynchronized());
        $this->assertTrue($form->has('fuelType'));
        $this->assertTrue($form->has('enginePower'));
    }

    public function testAppendFieldsWithInheritance()
    {
        $formBuilder = static::$formFactory->createBuilder();

        $dynamicFormFactory = new DynamicFormFactory(static::$formFactory);
        $reflection = new \ReflectionObject($dynamicFormFactory);
        $method = $reflection->getMethod('appendFields');
        $method->setAccessible(true);

        $method->invoke($dynamicFormFactory, $formBuilder, $this->secondForm);

        $form = $formBuilder->getForm();

        $this->assertTrue($form->isSynchronized());
        $this->assertTrue($form->has('fuelType'));
        $this->assertTrue($form->has('enginePower'));
        $this->assertTrue($form->has('engineVolume'));
        $this->assertTrue($form->has('doors'));
        $this->assertTrue($form->has('transmission'));
        $this->assertTrue($form->has('gear'));
        $this->assertTrue($form->has('title'));
    }

    public function testInheritParentFields()
    {
        $fields = new FormHeap();

        $dynamicFormFactory = new DynamicFormFactory($this->createMock(FormFactory::class));
        $reflection = new \ReflectionObject($dynamicFormFactory);
        $method = $reflection->getMethod('inheritParentFields');
        $method->setAccessible(true);

        $method->invoke($dynamicFormFactory, $fields, $this->secondForm);

        $this->assertCount(7, $fields);
    }

    public function testCreateForm()
    {
        $dynamicFormFactory = new DynamicFormFactory(static::$formFactory);
        $form = $dynamicFormFactory->createForm($this->secondForm);

        $this->assertTrue($form->isSynchronized());
        $this->assertTrue($form->has('fuelType'));
        $this->assertTrue($form->has('enginePower'));
        $this->assertTrue($form->has('engineVolume'));
        $this->assertTrue($form->has('doors'));
        $this->assertTrue($form->has('transmission'));
        $this->assertTrue($form->has('gear'));
        $this->assertTrue($form->has('title'));
    }
}