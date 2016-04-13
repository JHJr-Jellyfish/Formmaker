<?php

namespace Formmaker;

class Fieldset
{
	protected $slug;
	protected $form;
	protected $fields = [];

	public function __construct($slug)
	{
		$this->slug = $slug;
	}

	public function slug()
	{
		return $this->slug;
	}

	public function fields()
	{
		return $this->fields;
	}

	public function addField($field)
	{
		return $this->fields[] = $field;
	}

	public function removeField($field)
	{
		if($keyOfFieldToRemove = array_search($field, $this->fields, true))
		{
			unset($this->fields[$keyOfFieldToRemove]);
		}
		return $this;
	}

	public function assignToForm($form)
	{
		$this->form = $form;
		return $this;
	}

	public function remove() 
	{
		$this->form = null;
	}
	
	public function form()
	{
		return $this->form;
	}
}