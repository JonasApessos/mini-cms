<?php
	header("Content-type:text/css; charset: UTF-8");
	include_once "../php_style/style_variable.php";
?>
.login_form_top
	{
		width:25%;
		height:auto;
		background-color:rgb(30,30,30);
		margin:1% 1% 1% 0%;
		padding:1%;
		color:rgb(255,143,0);
		float:right;
		clear:right;
		box-shadow:0px 0px 10px 2px rgba(0,0,0,1);
		transition:box-shadow 1s;
	}
	
	.login_form_top:hover
	{
		box-shadow:0px 0px 5px 2px rgba(255,143,0,1);
	}
	
	.login_form_top table
	{
		width:100%;
		color:rgb(255,143,0);
		margin:auto;
	}
	
	.login_form_top table tr td input[type = text]
	{
		width:75%;
		background-color:rgb(50,50,50);
		border:2px solid white;
		border-color:rgb(200,133,0);
		color:rgb(255,143,0);
		box-shadow:0px 0px 10px 2px rgba(0,0,0,1);
		transition: border-color 1s , background-color 1s , box-shadow 1s;
	}
	
	.login_form_top table tr td input[type = text]:hover
	{
		border-color:rgb(255,143,0);
		background-color:rgb(70,70,70);
		box-shadow:0px 0px 5px 2px rgba(255,143,0,1);
	}
	
	.login_form_top table tr td input[type = password]
	{
		width:75%;
		background-color:rgb(50,50,50);
		border:2px solid white;
		border-color:rgb(200,133,0);
		color:rgb(255,143,0);
		box-shadow:0px 0px 10px 2px rgba(0,0,0,1);
		transition: border-color 1s , background-color 1s , box-shadow 1s;
	}
	
	.login_form_top table tr td input[type = password]:hover
	{
		border-color:rgb(255,143,0);
		background-color:rgb(70,70,70);
		box-shadow:0px 0px 5px 2px rgba(255,143,0,1);
	}
	
	
	.login_form_top table tr td input[type = submit]
	{
		background-color:rgba(50,50,50,1);
		border:2px solid white;
		border-color:rgba(200,133,0,1);
		color:rgba(200,133,0,1);
		box-shadow:0px 0px 10px 2px rgba(0,0,0,1);
		transition: border-color 1s , background-color 1s , box-shadow 1s , color 1s;
	}
	
	.login_form_top table tr td input[type =  submit]:hover
	{
		background-color:rgba(70,70,70,1);
		border-color:rgba(255,143,0,1);
		color:rgba(255,143,0,1);
		box-shadow:0px 0px 5px 2px rgba(255,143,0,1);
	}
	
	.login_form_top table tr td:nth-child(odd)
	{
		text-align:left;
	}
	
	.login_form_top table tr td:nth-child(even)
	{
		text-align:right;
	}
	
    a:visited
	{
		color:rgba(200,133,0,1);
		text-decoration:none;
	}
	
   a:link
	{
		color:rgba(200,133,0,1);
		text-decoration:none;
	}
	
   a:hover
	{
		color:rgb(255,143,0);
		text-decoration:none;
	}
	
   a:active
	{
		color:rgb(200,133,0);
		text-decoration:none;
	}
}