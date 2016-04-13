<?php

use Formmaker\Button;

class ButtonTest extends PHPUnit_Framework_TestCase
{
	protected function there_is_a_button() {
		return new Button();
	}
	
	/** @test */
	public function it_has_a_label() {
		$button = $this->there_is_a_button();
		$button->label('Go!');
		$this->assertEquals('Go!', $button->label());
	}
}