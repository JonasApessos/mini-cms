<?php
include_once "input_class.php";
echo number_format(((memory_get_usage() / 1000) / 1000),2,'.',','). "mb<br>";
$input1 = new input();
echo number_format(((memory_get_usage() / 1000) / 1000),2,'.',','). "mb<br>";
$input1->set_type("number");

$input1->display();

$input1->set_name("test_input");

$input1->set_class_id("test_class");

$input1->set_required(true);

$input1->display();
$input2 = new input();

$input2->set_type("text");

$input2->display();
$input2->display();
$input2->display();
$input2->display();
$input2->display();
$input2->display();
$input2->display();
$input2->display();
$input2->display();
echo number_format(((memory_get_usage() / 1000) / 1000),2,'.',','). "mb<br>";
?>