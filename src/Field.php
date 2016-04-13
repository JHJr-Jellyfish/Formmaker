<?php

namespace Formmaker;

class Field
{
	protected $slug;
	protected $type;
	protected $fieldset;
	protected $name;
	protected $form;

	public function __construct($slug, $type)
	{
		// We can use the slug to set a name
		$this->slug = $this->name = $slug;
		$this->type = $type;
	}

	public function slug()
	{
		return $this->slug;
	}

	public function type()
	{
		return $this->type;
	}

	public function name()
	{
		return $this->name;
	}

	public function assignToFieldset($fieldset) {
		$fieldset->addField($this);
		$this->fieldset = $fieldset;
		return $this;
	}

	public function fieldset()
	{
		return $this->fieldset;
	}

	public function removeFromFieldset()
	{
		if($this->fieldset instanceof Fieldset)
		{
			$this->fieldset->removeField($this);
		}
		
		$this->fieldset = null;

		return $this;
	}

	public function assignToForm($form) {
		$this->form = $form;
	}

	public function form() {
		// check for direct form relationship
		if($this->form != null) {
			return $this->form;
		}

		// check for fieldset
		if($this->fieldset) {
			return $this->fieldset->form();
		}

		return null;
	}

	public function removeFromForm()
	{
		$this->form = null;
	}

}