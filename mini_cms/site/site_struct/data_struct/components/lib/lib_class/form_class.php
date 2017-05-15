<?php
include_once "input_class.php";

$input1 = new input();

$input1->set_type("number");
$input1->set_class_id("test_class");

$input1->display();

?>