<?php
include_once "attributes_methods.php";

class html_standard_attributes_proccess extends html_standard_attributes
{	
	protected static $debug  = 0;
	protected $chain_attributes = "";
	
	public function debug()
	{
		self::$debug ? 0 : 1;
	}
	
	//--------SET FORM ATTRIBUTES--------//
	public function set_form($at_input)
	{
		$this->chain_attributes .= " form=\"".$at_input."\"";
	}
	public function set_formaction($at_input)
	{
		$this->chain_attributes .= " formaction=\"".$at_input."\"";
	}
	public function set_formenctype($at_input)
	{
		$this->chain_attributes .= " formenctype=\"".$at_input."\"";
	}
	public function set_formmethod($at_input)
	{
		$this->chain_attributes .= " formmethod=\"".$at_input."\"";
	}
	public function set_formnovalidate($at_input)
	{
		$this->chain_attributes .= " formnovalidate=\"".$at_input."\"";
	}
	public function set_formtarget($at_input)
	{
		$this->chain_attributes .= " formtarget=\"".$at_input."\"";
	}
	//--------SET STANDARD ATTRIBUTES--------//
	public function set_type($at_input)
	{
		$this->chain_attributes .= " type=\"".$at_input."\"";
	}
	public function set_name($at_input)
	{
		$this->chain_attributes .= " name=\"".$at_input."\"";
	}
	public function set_id($at_input)
	{
		$this->chain_attributes .= " id=\"".$at_input."\"";
	}
	public function set_class_id($at_input)
	{
		$this->chain_attributes .= " class_id=\"".$at_input."\"";
	}
	public function set_autocomplete($at_input)
	{
		$this->chain_attributes .= " autocomplete=\"".$at_input."\"";
	}
	public function set_autofocus($at_input)
	{
		$this->chain_attributes .= " autofocus=\"".$at_input."\"";
	}
	public function set_dimensions($at_input_x , $at_input_y)
	{
		if(empty($at_input_x))
			$this->chain_attributes .= "";
		else
			$this->chain_attributes .= " width=\"".$at_input_x."\"";
	
		if(empty($at_input_y))
			$this->chain_attributes .= "";
		else
			$this->chain_attributes .= " height=\"".$at_input_y."\"";
	}
	public function set_list($at_input)
	{
		$this->chain_attributes .= " list=\"".$at_input."\"";
	}
	public function set_min_max($at_input_min , $at_input_max)
	{
		if(empty($at_input_min))
			$this->chain_attributes .= "";
		else
			$this->chain_attributes .= " min=\"".$at_input_min."\"";
	
		if(empty($at_input_max))
			$this->chain_attributes .= "";
		else
			$this->chain_attributes .= " max=\"".$at_input_max."\"";
	}
	public function set_multiple($at_input)
	{
		$this->chain_attributes .= " multiple=\"".$at_input."\"";
	}
	public function set_pattern($at_input)
	{
		$this->chain_attributes .= " pattern=\"".$at_input."\"";
	}
	public function set_placeholder($at_input)
	{
		$this->chain_attributes .= " placeholder=\"".$at_input."\"";
	}
	public function set_step($at_input)
	{
		$this->chain_attributes .= " step=\"".$at_input."\"";
	}
	public function set_novalidate($at_input)
	{
		$this->chain_attributes .= " novalidate=\"".$at_input."\"";
	}
	public function set_maxlength($at_input)
	{
		$this->chain_attributes .= " maxlength=\"".$at_input."\"";
	}
	public function set_src($at_input)
	{
		$this->chain_attributes .= " src=\"".$at_input."\"";
	}
	public function set_value($at_input)
	{
		$this->chain_attributes .= " value=\"".$at_input."\"";
	}
	public function set_dirname($at_input)
	{
		$this->chain_attributes .= " dirname=\"".$at_input."\"";
	}
	public function set_checked($at_input)
	{
		$this->chain_attributes .= " checked=\"".$at_input."\"";
	}
	public function set_spellcheck()
	{
		$this->chain_attributes .= " spellcheck=\"TRUE\"";
	}
	//--------SET SWITCH--------//
	public function set_required()
	{
		$this->chain_attributes .= " required=\"required\"";
	}
	public function set_disabled()
	{
		$this->chain_attributes .= " disabled=\"disabled\"";
	}
	public function set_readonly()
	{
		$this->chain_attributes .= " readonly=\"readonly\"";
	}
	//--------SET EVENTS--------//
	public function set_onfocusout($at_input)
	{
		$this->chain_attributes .= " onfocusout=\"".$at_input."\"";
	}
	public function set_onchange($at_input)
	{
		$this->chain_attributes .= " onchange=\"".$at_input."\"";
	}
	public function set_onclick($at_input)
	{
		$this->chain_attributes .= " onclick=\"".$at_input."\"";
	}
	
	public function clear_data()
	{
		$this->chain_attributes = "";
	}
}
?>