<?php

use Formmaker\Field;

class FieldTest extends PHPUnit_Framework_TestCase
{

	public function tearDown()
	{
		Mockery::close();
	}

	public function setUp()
	{
		$this->there_is_a_field();
	}

	protected function there_is_a_field() {
		return new Field('username', 'input');
	}

	protected function there_is_a_form() {
		return Mockery::mock('Form');
	}

	protected function there_is_a_fieldset() {
		return Mockery::mock('Fieldset');
	}

	/** @test */
	public function it_has_a_slug()
	{
		$field = $this->there_is_a_field();
		$this->assertEquals('username', $field->slug());
	}

	/** @test */
	public function it_has_a_name()
	{
		$field = $this->there_is_a_field();
		$this->assertEquals('username', $field->name());
	}

	/** @test */
	public function it_has_a_type()
	{
		$field = $this->there_is_a_field();
		$this->assertEquals('input', $field->type());
	}

	/** @test */
	public function it_knows_the_fieldset_it_belongs_to()
	{
		$fieldset = $this->there_is_a_fieldset();
		// expect $fieldset->addField to be called one and return $fieldset
		$fieldset->shouldReceive('addField')->once()->andReturn($fieldset);

		$field = $this->there_is_a_field();
		$field->assignToFieldset($fieldset);

		$this->assertEquals($fieldset, $field->fieldset());
	}

	/** @test */
	public function it_can_forget_the_fieldset_it_belongs_to()
	{
		// creat Fieldset Mock with "addFieldset" function
		$fieldset = Mockery::mock('Fieldset');
		$fieldset->shouldReceive('addField')
			->once()
			->andReturn($fieldset);

		$field = $this->there_is_a_field();

		$field->assignToFieldset($fieldset);

		// run removeField once on Fieldset
		$fieldset->shouldReceive('removeField')
			->atMost()->times(1)
			->andReturn($fieldset);

		$field->removeFromFieldset();

		$this->assertEquals(null, $field->fieldset());
	}
	
	/** @test */
	public function it_knows_the_form_it_directly_belongs_to()
	{
		$field = $this->there_is_a_field();
		$form = $this->there_is_a_form();
		$field->assignToForm($form);
		$this->assertEquals($form, $field->form());
	}

	/** @test */
	public function it_can_forget_the_form_it_directly_belongs_to()
	{
		$field = $this->there_is_a_field();
		$form = $this->there_is_a_form();

		$field->assignToForm($form);
		$field->removeFromForm();

		$this->assertEquals(null, $field->form());
	}

	/** @test */
	public function it_can_get_the_form_its_fieldset_belongs_to()
	{
		$field = $this->there_is_a_field();
		$fieldset = $this->there_is_a_fieldset();
		$form = $this->there_is_a_form();

		$fieldset->shouldReceive('addField')->once()->andReturn($fieldset);
		$fieldset->shouldReceive('form')->once()->andReturn($form);

		// add field to fieldset
		$field->assignToFieldset($fieldset);

		$this->assertEquals($form, $field->form());
	}
}