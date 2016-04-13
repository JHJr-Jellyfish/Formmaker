<?php

namespace Formmaker;

class Button
{
	protected $label;

	public function label($label = null)
	{
		if($label) {
			$this->label = $label;
			return $this;
		}

		return $this->label;
	}
}