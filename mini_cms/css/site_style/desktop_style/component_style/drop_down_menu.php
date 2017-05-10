<?php
	#header("content-type:text/css; charset: UTF-8")
	include_once "../php_style/style_variable.php";
?>
<?php

echo "@media screen and (min-width:480px)";
echo "{";
echo".dropdown";
	echo "{";
		echo "width:10%;";
		echo "min-width:125px;";
	    echo "height:50px;";
		echo "background-color:rgba(20,20,20,1);";
		echo "border: ".$border_width."px solid ". $border_normal_color2 . ";";
		echo "border-radius:25px;";
		echo "float:left;";
		echo "margin:auto;";
		echo "position:relative;";
		echo "z-index:0;";
		echo "overflow:hidden;";
		echo "transition: z-index 0s, height 1s;"; 
	echo "}";

	echo ".dropdown:hover";
	echo "{";
	echo "	z-index:1;";
	echo "	height:" . $menu_height ."px;";
	echo "}";

	echo ".dropdown div
	{
		background-color:rgb(200,130,0);
		width:100%;
		height:50px;
		text-align:center;
		float:left;
		clear:both;
		border-bottom:2px solid black;
		border-width:2px;
		border-color:rgba(200,120,0,1);
		transition: background-color 1s, border-radius 1s , border-color 1s;
	}

	.dropdown div:hover
	{
		background-color:rgba(230,133,0,1);
		border-radius:0px 0px 25px 25px;
		border-color:rgba(255,133,0,1);
	}
	
	.dropdown a div h4
	{
		color:rgb(255,255,255);
	}
	
		.dropdown a:link
	{
		color:rgb(200,200,200);
		text-decoration:none;
	}
	
	.dropdown a:hover
	{
		color:rgb(230,143,0);
		text-decoration:none;
	}
	
	.dropdown a:active
	{
		color:rgb(200,200,200);
		text-decoration:none;
	}
	
	.dropdown a:visited
	{
		color:rgb(200,200,200);
		text-decoration:none;
	}
	
}";?>