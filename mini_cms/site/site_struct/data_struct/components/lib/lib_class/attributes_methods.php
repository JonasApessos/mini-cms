<?php
abstract class html_standard_attributes
{	
	//--------SET FORM ATTRIBUTES--------//
	abstract public function set_form($at_input);
	abstract public function set_formaction($at_input);
	abstract public function set_formenctype($at_input);
	abstract public function set_formmethod($at_input);
	abstract public function set_formnovalidate($at_input);
	abstract public function set_formtarget($at_input);
	//--------SET STANDARD ATTRIBUTES--------//
	abstract public function set_type($at_input);
	abstract public function set_name($at_input);
	abstract public function set_id($at_input);
	abstract public function set_class_id($at_input);
	abstract public function set_autocomplete($at_input);
	abstract public function set_autofocus($at_input);	
	abstract public function set_dimensions($at_input_x , $at_input_y);
	abstract public function set_list($at_input);
	abstract public function set_min_max($at_input_min , $at_input_max);
	abstract public function set_multiple($at_input);
	abstract public function set_pattern($at_input);
	abstract public function set_placeholder($at_input);
	abstract public function set_step($at_input);
	abstract public function set_novalidate($at_input);
	abstract public function set_maxlength($at_input);
	abstract public function set_src($at_input);
	abstract public function set_value($at_input);
	abstract public function set_dirname($at_input);
	abstract public function set_checked($at_input);
	//--------SET SWITCH--------//
	abstract public function set_required();
	abstract public function set_disabled();
	abstract public function set_readonly();
	//--------SET EVENTS--------//
	abstract public function set_onfocusout($at_input);
	abstract public function set_onchange($at_input);
	abstract public function set_onclick($at_input);
	//---------------------------------------------------------------------------------------//
	/*//--------GET FORM ATTRIBUTES--------//
	abstract public function get_form();
	abstract public function get_formaction();
	abstract public function get_formenctype();
	abstract public function get_formmethod();
	abstract public function get_formnovalidate();
	abstract public function get_formtarget();
	//--------GET STANDARD ATTRIBUTES--------//
	abstract public function get_name();
	abstract public function get_id();
	abstract public function get_class_id();
	abstract public function get_autocomplete();
	abstract public function get_autofocus();	
	abstract public function get_dimension_x();
	abstract public function get_dimension_y();
	abstract public function get_list();
	abstract public function get_min();
	abstract public function get_max();
	abstract public function get_multiple();
	abstract public function get_pattern();
	abstract public function get_placeholder();
	abstract public function get_step();
	abstract public function get_novalidate();
	abstract public function get_maxlength();
	abstract public function get_src();
	abstract public function get_value();
	abstract public function get_dirname();
	abstract public function get_checked();
	//--------GET SWITCH--------//
	abstract public function get_required();
	abstract public function get_disabled();
	abstract public function get_readonly();
	//--------GET EVENTS--------//
	abstract public function get_onfocusout();
	abstract public function get_onchange();*/
}
?>