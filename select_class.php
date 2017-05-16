<?php

class select
{
	private $chain_attributes = "";
	private $options = "";
	
	public function display()
	{
		echo "<select ".$this->chain_attributes.">";
		echo $this->options;
		echo "</select>";
	}
	
	public function add_option($title,$value,$name)
	{
		$this->options .= "<option ".((!empty($value)) ? "value=\"".$value."\"" : "")." ".( !empty($value) ? "value=\"".$value."\"" : "").">".$title."</option>";
	}
	
	
}

$select = new select();

$select->add_option("test",NULL,"");
$select->add_option("test2",NULL,"");
$select->add_option("test3","21","charles");

$select->display();


?>