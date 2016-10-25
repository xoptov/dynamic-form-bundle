<?php

namespace Xoptov\DynamicFormBundle\Tests\Factory;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormFactory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Xoptov\DynamicFormBundle\DataStructure\FormHeap;
use Xoptov\DynamicFormBundle\Entity\Form;
use Xoptov\DynamicFormBundle\Entity\Option;
use Xoptov\DynamicFormBundle\Entity\FormOption;
use Xoptov\DynamicFormBundle\Form\Type\ObjectType;
use Xoptov\DynamicFormBundle\Model\FormInterface;
use Xoptov\DynamicFormBundle\Model\ObjectInterface;
use Xoptov\DynamicFormBundle\Factory\DynamicFormFactory;

class DynamicFormFactoryTest extends KernelTestCase
{
    /** @var FormInterface */
    private $firstForm;

    /** @var FormInterface */
    private $secondForm;

    public static function setUpBeforeClass()
    {
        static::bootKernel();
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
            ->setName('engine')
            ->setClass(ChoiceType::class)
            ->setPriority(2048)
            ->setEnabled(true);

        $this->firstForm->addChildren($field);

        $field = new Form();
        $field
            ->setType(FormInterface::TYPE_FIELD)
            ->setName('fuel')
            ->setClass(ChoiceType::class)
            ->setPriority(1024)
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
            ->setPriority(512)
            ->setEnabled(true);

        $this->secondForm->addChildren($field);

        $field = new Form();
        $field
            ->setType(FormInterface::TYPE_FIELD)
            ->setName('transmission')
            ->setClass(ChoiceType::class)
            ->setPriority(256)
            ->setEnabled(true);

        $this->secondForm->addChildren($field);

        $field = new Form();
        $field
            ->setType(FormInterface::TYPE_FIELD)
            ->setName('gear')
            ->setClass(ChoiceType::class)
            ->setPriority(128)
            ->setEnabled(true);

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
        $mockFormFactory = $this->createMock(FormFactory::class);

        $dynamicFormFactory = new DynamicFormFactory($mockFormFactory);
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
        $mockEventDispatcher = $this->createMock(EventDispatcher::class);
        $mockFormFactory = $this->createMock(FormFactory::class);

        $formBuilder = new FormBuilder('form', null, $mockEventDispatcher, $mockFormFactory);

        $dynamicFormFactory = new DynamicFormFactory($mockFormFactory);
        $reflection = new \ReflectionObject($dynamicFormFactory);
        $method = $reflection->getMethod('appendFields');
        $method->setAccessible(true);

        $method->invoke($dynamicFormFactory, $formBuilder, $this->firstForm);

        $this->assertTrue($formBuilder->has('engine'));
        $this->assertTrue($formBuilder->has('fuel'));
    }

    public function testAppendFieldsWithInheritance()
    {
        $mockEventDispatcher = $this->createMock(EventDispatcher::class);
        $mockFormFactory = $this->createMock(FormFactory::class);

        $formBuilder = new FormBuilder('form', null, $mockEventDispatcher, $mockFormFactory);

        $dynamicFormFactory = new DynamicFormFactory($mockFormFactory);
        $reflection = new \ReflectionObject($dynamicFormFactory);
        $method = $reflection->getMethod('appendFields');
        $method->setAccessible(true);

        $method->invoke($dynamicFormFactory, $formBuilder, $this->secondForm);

        $this->assertTrue($formBuilder->has('engine'));
        $this->assertTrue($formBuilder->has('fuel'));
        $this->assertTrue($formBuilder->has('doors'));
        $this->assertTrue($formBuilder->has('transmission'));
        $this->assertTrue($formBuilder->has('gear'));
        $this->assertTrue($formBuilder->has('title'));
    }

    public function testInheritParentFields()
    {
        $mockFormFactory = $this->createMock(FormFactory::class);
        $fields = new FormHeap();

        $dynamicFormFactory = new DynamicFormFactory($mockFormFactory);
        $reflection = new \ReflectionObject($dynamicFormFactory);
        $method = $reflection->getMethod('inheritParentFields');
        $method->setAccessible(true);

        $method->invoke($dynamicFormFactory, $fields, $this->secondForm);

        $this->assertCount(6, $fields);
    }
}