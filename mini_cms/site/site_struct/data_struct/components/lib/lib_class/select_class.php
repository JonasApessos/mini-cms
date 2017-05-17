<?php
include_once "attributes_methods_proccess.php";

class select extends html_standard_attributes_proccess
{
	private $options = "";
	private $option_attr = "";
	
	public function display()
	{
		echo "<select ".$this->chain_attributes.">";
		echo $this->options;
		echo "</select>";
	}
	
	public function add_option($title,$value,$label)
	{
		((!empty($value)) ?	$this->set_option_value($value) : "");
		((!empty($label)) ?	$this->set_option_label($label) : "");
		
		$this->options .= "<option ".$this->option_attr.">".$title."</option>";
	}
	
	public function set_option_disabled()
	{
		$this->option_attr .= " disabled";
	}
	
	private function set_option_label($at_input)
	{
		$this->option_attr .= " label=\"".$at_input."\"";
	}
	
	public function set_option_selected()
	{
		$this->option_attr .= " selected";
	}
	
	private function set_option_value($at_input)
	{
		$this->option_attr .= " value=\"".$at_input."\"";
	}
	
	public function option_clear_attr()
	{
		$this->option_attr = "";
	}
	
	public function option_clear_data()
	{
		$this->option_clear_attr();
		$this->options = "";
	}
}
?>