<?php

namespace Formmaker;

class Form
{
	protected $slug;
	protected $action;
	protected $buttons = [];
	protected $fields = [];
	protected $fieldsets = [];

	public function __construct($slug, $action = 'self') {
		$this->slug = $slug;
		$this->action = $action;
	}

	public function slug()
	{
		return $this->slug;
	}

	public function action()
	{
		return $this->action;
	}

	public function addField($field) 
	{
		$this->fields[] = $field;
		return $this;
	}

	public function removeField($field) {
		if($keyOfFieldToRemove = array_search($field, $this->fields, true))
		{
			unset($this->fields[$keyOfFieldToRemove]);
		}
		return $this;
	}

	public function fields() {
		return $this->fields;
	}

	public function addFieldset($fieldset)
	{
		$this->fieldsets[] = $fieldset;
		return $this;
	}

	public function fieldsets() {
		return $this->fieldsets;
	}

	public function removeFieldset($fieldset) {
		if($keyOfFieldsetToRemove = array_search($fieldset, $this->fieldsets, true))
		{
			unset($this->fieldsets[$keyOfFieldsetToRemove]);
		}
		return $this;
	}

	public function addButton($button) {
		$this->buttons[] = $button;
		return $this;
	}

	public function removeButton($button) {
		if($keyOfButtonToRemove = array_search($button, $this->buttons, true))
		{
			unset($this->buttons[$keyOfButtonToRemove]);
		}
		return $this;
	}
	
	public function buttons() {
		return $this->buttons;
	}

	public function addFieldToFieldset($field, $fieldset)
	{
		return $field;
	}
}