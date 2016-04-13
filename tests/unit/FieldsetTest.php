<?php

use Formmaker\Fieldset;

class FieldsetTest extends PHPUnit_Framework_TestCase
{

	protected function there_is_a_fieldset() {
		return new Fieldset('section');
	}

	protected function there_is_a_button() {
		return Mockery::mock('Button');
	}

	/** @test */
	public function it_has_be_instantiated() {
		$fieldset = $this->there_is_a_fieldset();
		$this->assertInstanceOf(Fieldset::class, $fieldset);
	}
	
	/** @test */
	public function it_has_a_slug() {
		$fieldset = $this->there_is_a_fieldset();
		$this->assertEquals('section', $fieldset->slug());
	}

	/** @test */
	public function it_can_have_fields() {
		$fieldset = $this->there_is_a_fieldset();
		$fieldset->addField('first name');
		$fieldset->addField('last name');

		$this->assertCount(2, $fieldset->fields());
	}

	/** @test */
	public function it_can_remove_fields() {
		$fieldset = $this->there_is_a_fieldset();
		$fieldset->addField('first name');
		$fieldset->addField('last name');
		$fieldset->addField('removee');
		$fieldset->removeField('removee');

		$this->assertCount(2, $fieldset->fields());
	}


	/** @test */
	public function it_knows_the_fields_that_belong_to_it()
	{
		//$this->assertEquals($field->fields());
	}

	/** @test */
	public function it_knows_what_form_it_belongs_to() {
		$fieldset = $this->there_is_a_fieldset();
		$fieldset->assignToForm('Testing');

		$this->assertEquals('Testing', $fieldset->form());
	}

	/** @test */
	public function it_can_be_removed_from_its_form() {
		$fieldset = $this->there_is_a_fieldset();
		$fieldset->assignToForm('Testing');
		$fieldset->remove();

		$this->assertEquals(null, $fieldset->form());
	}

	/** @test */
	public function it_can_have_buttons() {
		$fieldset = $this->there_is_a_fieldset();
		$button = $this->there_is_a_button();

		$fieldset->addButton($button);

		$this->assertContains($button, $fieldset->buttons());
	}
}