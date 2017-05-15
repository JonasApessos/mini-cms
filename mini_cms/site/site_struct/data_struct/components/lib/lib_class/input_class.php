<?php
include_once	"attributes_methods.php";

class input extends html_stantard_attributes
{
	private static $debug = 0;
	private $input = "";
	private $chain_attribute = "";
	
	private $at_type = "";
	private $at_name = "";
	private $at_id = "";
	private $at_class_id = "";
	private $at_autocomplete = "";
	private $at_autofocus = "";
	
	private $at_form = "";
	private $at_formaction = "";
	private $at_formenctype = "";
	private $at_formmethod = "";
	private $at_formnovalidate = "";
	private $at_formtarget = "";
	
	private $at_dimension_x = "";
	private $at_dimension_y = "";
	
	private $at_list = "";
	private $at_min = "";
	private $at_max = "";
	private $at_multiple = "";
	private $at_pattern = "";
	private $at_placeholder = "";
	private $at_step = "";
	private $at_novalidate = "";
	
	private $at_alt = "";
	private $at_disabled = "";
	private $at_readonly = "";
	private $at_required = "";
	private $at_checked = "";
	private $at_dirname = "";
	private $at_maxlength = "";
	private $at_src = "";
	private $at_value = "";
	
	private $ev_onchange = "";
	private $ev_onfocusout = "";

	public function debug()
	{
		self::$debug ? self::$debug = 0 : self::$debug = 1;
	}
	
	public function clear_data()
	{
		$clear = "";
		
		$this->chain_attribute = $clear;
		
		$this->at_type = $clear;
		$this->at_name = $clear;
		$this->at_id = $clear;
		$this->at_class_id = $clear;
		$this->at_autocomplete = $clear;
		$this->at_autofocus = $clear;
		$this->at_form = $clear;
		$this->at_formaction = $clear;
		$this->at_formenctype = $clear;
		$this->at_formmethod = $clear;
		$this->at_formnovalidate = $clear;
		$this->at_formtarget = $clear;
		$this->at_dimension_x = $clear;
		$this->at_dimension_y = $clear;
		$this->at_list = $clear;
		$this->at_min = $clear;
		$this->at_max = $clear;
		$this->at_multiple = $clear;
		$this->at_pattern = $clear;
		$this->at_placeholder = $clear;
		$this->at_step = $clear;
		$this->at_novalidate = $clear;
		$this->at_alt = $clear;
		$this->at_disabled = $clear;
		$this->at_readonly = $clear;
		$this->at_required = $clear;
		$this->at_checked = $clear;
		$this->at_dirname = $clear;
		$this->at_maxlength = $clear;
		$this->at_src = $clear;
		$this->at_value = $clear;
		
		$this->ev_onchange = $clear;
		$this->ev_onfocusout = $clear;
		
		if(self::$debug)
			echo "data cleared";
	}
	
	public function input_type()
	{
		$this->chain_attribute .= $this->get_type();
		$this->chain_attribute .= $this->get_name();
		$this->chain_attribute .= $this->get_id();
		$this->chain_attribute .= $this->get_class_id();
		$this->chain_attribute .= $this->get_autocomplete();
		$this->chain_attribute .= $this->get_autofocus();
		$this->chain_attribute .= $this->get_form();
		$this->chain_attribute .= $this->get_formaction();
		$this->chain_attribute .= $this->get_formenctype();
		$this->chain_attribute .= $this->get_formmethod();
		$this->chain_attribute .= $this->get_formnovalidate();
		$this->chain_attribute .= $this->get_formtarget();
		$this->chain_attribute .= $this->get_dimension_x();
		$this->chain_attribute .= $this->get_dimension_y();
		$this->chain_attribute .= $this->get_list();
		$this->chain_attribute .= $this->get_min();
		$this->chain_attribute .= $this->get_max();
		$this->chain_attribute .= $this->get_multiple();
		$this->chain_attribute .= $this->get_pattern();
		$this->chain_attribute .= $this->get_placeholder();
		$this->chain_attribute .= $this->get_step();
		$this->chain_attribute .= $this->get_novalidate();
		$this->chain_attribute .= $this->get_required();
		$this->chain_attribute .= $this->get_readonly();
		$this->chain_attribute .= $this->get_src();
		$this->chain_attribute .= $this->get_maxlength();
		$this->chain_attribute .= $this->get_disabled();
		$this->chain_attribute .= $this->get_dirname();
		$this->chain_attribute .= $this->get_checked();
		$this->chain_attribute .= $this->get_value();
		$this->chain_attribute .= $this->get_onchange();
		$this->chain_attribute .= $this->get_onfocusout();
		
		if(self::$debug)
			echo "chain attribute: (".$this->chain_attribute.")";
	}
	
	public function display()
	{
		$this->input_type();
			echo "<input".$this->chain_attribute." >";
	}
	
//------------------------------------------------------------------------------------------//	
	
	
	//SET METHODS
	public function set_type($at_type)
	{
		$this->at_type = " type=\"".$at_type."\"";
	}
	
	public function set_name($at_name)
	{
		$this->at_name = " name=\"".$at_name."\"";
	}
	
	public function set_id($at_id)
	{
		$this->at_id = " id=\"".$at_id."\"";
	}
	
	public function set_class_id($at_class_id)
	{
		$this->at_class_id = " class=\"".$at_class_id."\"";
	}
	
	public function set_autocomplete($at_autocomplete)
	{
		$this->at_autocomplete = " autocomplete=\"".$at_autocomplete."\"";
	}
	
	public function set_autofocus($at_autofocus)
	{
		$this->at_autofocus = " autofocus=\"".$at_autofocus."\"";
	}
	
	public function set_form($at_form)
	{
		$this->at_form = " form=\"".$at_form."\"";
	}
	
	public function set_formaction($at_formaction)
	{
		$this->at_formaction = " formaction=\"".$at_formaction."\"";
	}
	
	public function set_formenctype($at_formenctype)
	{
		$this->at_formenctype = " formenctype=\"".$at_formenctype."\"";
	}
	
	public function set_formmethod($at_formmethod)
	{
		$this->at_formmethod = " formmethod=\"".$at_formmethod."\"";
	}
	
	public function set_formnovalidate($at_formnovalidate)
	{
		$this->at_formnovalidate = " formnovalidate=\"".$at_formnovalidate."\"";
	}
	
	public function set_formtarget($at_formtarget)
	{
		$this->at_formtarget = " formtarget=\"".$at_formtarget."\"";
	}
	
	public function set_dimensions($at_x , $at_y)
	{
		$this->at_x = " width=\"".$at_x."\"";
		$this->at_y = " height=\"".$at_name."\"";
	}
	
	public function set_list($at_list)
	{
		$this->at_list = " list=\"".$at_list."\"";
	}
	
	public function set_min_max($at_min , $at_max)
	{
		$this->at_min = " min=\"".$at_min."\"";
		$this->at_max = " max=\"".$at_max."\"";
	}
	
	public function set_multiple($at_multiple)
	{
		$this->at_multiple = " multiple=\"".$at_multiple."\"";
	}
	
	public function set_pattern($at_pattern)
	{
		$this->at_pattern = " pattern=\"".$at_pattern."\"";
	}
	
	public function set_placeholder($at_placeholder)
	{
		$this->at_placeholder = " placeholder=\"".$at_placeholder."\"";
	}
	
	public function set_required()
	{
			$this->at_required = " required";
	}
	
	public function set_step($at_step)
	{
		$this->at_step = " step=\"".$at_step."\"";
	}
	
	public function set_novalidate($at_novalidate)
	{
		$this->at_novalidate = " novalidate=\"".$at_novalidate."\"";
	}
	
	public function set_checked($at_checked)
	{
		$this->at_checked = " checked=\"".$at_checked."\"";
	}
	
	public function set_dirname($at_dirname)
	{
		$this->at_dirname = " dirname=\"".$at_dirname."\"";
	}
	
	public function set_disabled()
	{
			$this->at_disabled = " disabled";
	}
	
	public function set_maxlength($at_maxlength)
	{
		$this->at_maxlength = " maxlength=\"".$at_maxlength."\"";
	}
	
	public function set_readonly()
	{
			$this->at_readonly = " readonly";
	}
	
	public function set_src($at_src)
	{
		$this->at_src = " src=\"".$at_src."\"";
	}
	
	public function set_value($at_value)
	{
		$this->at_value = " value=\"".$at_value."\"";
	}
	
	public function set_onchange($ev_onchange)
	{
			$this->ev_onchange = " onChange=\"".$ev_onchange."\"";
	}
	
	public function set_onfocusout($ev_onfocusout)
	{
			$this->ev_onfocusout = " onfocusout=\"".$ev_onfocusout."\"";
	}
	
//--------------------------------------------------------------------------------------------//

	//GET METHODS
	public function get_type()
	{ 
		return $this->at_type;
	}
	
	public function get_name()
	{ 
		return $this->at_name;
	}
	
	public function get_id()
	{
		return $this->at_id;
	}
	
	public function get_class_id()
	{
		return $this->at_class_id;
	}
	
	public function get_autocomplete()
	{
		return $this->at_autocomplete;
	}
	
	public function get_autofocus()
	{
		return $this->at_autofocus;
	}
	
	public function get_form()
	{
		return $this->at_form;
	}
	
	public function get_formaction()
	{
		return $this->at_formaction;
	}
	
	public function get_formenctype()
	{
		return $this->at_formenctype;
	}
	
	public function get_formmethod()
	{
		return $this->at_formmethod;
	}
	
	public function get_formnovalidate()
	{
		return $this->at_formnovalidate;
	}
	
	public function get_formtarget()
	{
		return $this->at_formtarget;
	}
	
	public function get_dimension_x()
	{
		return $this->at_dimension_x;
	}
	
	public function get_dimension_y()
	{
		return $this->at_dimension_y;
	}
	
	public function get_list()
	{
		return $this->at_list;
	}
	
	public function get_min()
	{
		return $this->at_min;
	}
	
	public function get_max()
	{
		return $this->at_max;
	}
	
	public function get_multiple()
	{
		return $this->at_multiple;
	}
	
	public function get_pattern()
	{
		return $this->at_pattern;
	}
	
	public function get_placeholder()
	{
		return $this->at_placeholder;
	}
	
	public function get_required()
	{
		return $this->at_required;
	}
	
	public function get_step()
	{
		return $this->at_step;
	}
	
	public function get_novalidate()
	{
		return $this->at_novalidate;
	}
	
	public function get_checked()
	{
		return $this->at_checked;
	}
	
	public function get_dirname()
	{
		return $this->at_dirname;
	}
	
	public function get_disabled()
	{
		return $this->at_disabled;
	}
	
	public function get_maxlength()
	{
		return $this->at_maxlength;
	}
	
	public function get_readonly()
	{
		return $this->at_readonly;
	}
	
	public function get_src()
	{
		return $this->at_src;
	}
	
	public function get_value()
	{
		return $this->at_value;
	}
	
	public function get_onchange()
	{ 
		return $this->ev_onchange;
	}
	
	public function get_onfocusout()
	{ 
		return $this->ev_onfocusout;
	}
}
?>