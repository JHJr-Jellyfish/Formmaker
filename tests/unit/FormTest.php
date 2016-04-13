<?php

use Formmaker\Form;

class FormTest extends PHPUnit_Framework_TestCase
{

	public function tearDown()
	{
		Mockery::close();
	}

	protected function there_is_a_form()
	{
		return new Form('register');
	}

	protected function there_is_a_fieldset()
	{
		return Mockery::mock('Fieldset');
	}

	protected function there_is_a_field()
	{
		return Mockery::mock('Field');
	}

	/** @test */
	public function it_has_a_slug()
	{
		$form = $this->there_is_a_form();
		$this->assertEquals('register', $form->slug());
	}

	/** @test */
	public function it_can_have_fieldsets()
	{
		$form = $this->there_is_a_form();

		$form->addFieldset('Access Information');
		$form->addFieldset('Profile');
		
		$this->assertCount(2, $form->fieldsets());
	}

	/** @test */
	public function it_can_have_fields()
	{
		$form = $this->there_is_a_form();

		$form->addField('First Name');
		$form->addField('Last Name');
		
		$this->assertCount(2, $form->fields());
	}
	
	/** @test */
	public function it_can_have_buttons()
	{
		$form = $this->there_is_a_form();
		$form->addButton('Submit');
		
		$this->assertCount(1, $form->buttons());
	}

	/** @test */
	public function it_can_remove_a_button()
	{
		$form = $this->there_is_a_form();

		$form->addButton('Submit');
		$form->addButton('remove me');

		$form->removeButton('remove me');
		$this->assertCount(1, $form->buttons());
	}

	/** @test */
	public function it_can_remove_a_field()
	{
		$form = $this->there_is_a_form();

		$form->addField('First Name');
		$form->addField('Last Name');

		$form->removeField('Last Name');
		
		$this->assertCount(1, $form->fields());
	}

	/** @test */
	public function it_can_remove_a_fieldset()
	{
		$form = $this->there_is_a_form();

		$form->addFieldset('Access Information');
		$form->addFieldset('Profile');

		$form->removeFieldset('Profile');
		
		$this->assertCount(1, $form->fieldsets());
	}

	/** @test */
	public function it_can_add_a_field_to_a_fieldset_it_owns()
	{
		$form = $this->there_is_a_form();
		$fieldset = $this->there_is_a_fieldset();
		$field = $this->there_is_a_field();
		return Mockery::mock('Field');

		$form->addFieldset($fieldset);
		$form->addFieldToFieldset($field, $fieldset);

		$this->assertContains($field, $field->fieldsets());
	}
}