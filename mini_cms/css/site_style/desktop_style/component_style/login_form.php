<?php
	Header("Content-type:text/css; charset: UTF-8");
	include_once "../php_style/style_variable.php";
?>
@media screen and (min-width:480px)
{
	.login_form_top
	{
		width:25%;
		height:auto;
		background-color:rgba(30,30,30,1.0);
		margin:1% 1% 1% 0%;
		padding:1%;
		float:right;
		clear:right;
	}
	
	.login_form_top div
	{
		width:98%;
		clear:both;
		margin:1% auto;
		padding:1%;
		float:left;
		background-color:rgba(50,50,50,1.0);
	}
	
	.login_form_top div input
	{
		width:25%;
		height:20px;
		float:right;
		clear:right;
		margin:auto;
		padding:0%;
	}
	
	.login_form_top div h3
	{
		width:auto;
		clear:left;
		float:left;
		margin:0%;
		padding:0%;
	}
	
	.login_form_top div h4:nth-child(1)
	{
		width:auto;
		float:left;
		clear:left;
		margin:auto;
		padding:0%;
	}
	
	.login_form_top div h4:nth-child(2)
	{
		width:auto;
		float:right;
		clear:right;
		margin:auto;
		padding:0%;
	}
	
	.login_form_top a:link
	{
		color:rgba(230,120,0,1.0);
		text-decoration:none;
	}
	
	.login_form_top a:visited
	{
		color:rgba(230,120,0,1.0);
		text-decoration:none;
	}
	
	.login_form_top a:hover
	{
		color:rgba(255,140,0,1.0);
		text-decoration:none;
	}
	
	.login_form_top a:active
	{
		color:rgba(230,120,0,1.0);
		text-decoration:none;
	}
}

@media screen and (min-width:480px)
{
	.loged_form_top
	{
		width:25%;
		height:auto;
		background-color:rgba(30,30,30,1.0);
		margin:1% 1% 1% 0%;
		padding:1%;
		float:right;
		clear:right;
	}
	
	.loged_form_top div:nth-child(1)
	{
		width:25%;
		min-width:100px;
		float:left;
		clear:left;
		margin:auto 5% 1% auto;
		padding:0%;
		background-color:rgba(50,50,50,1.0);
	}
	
	
	.loged_form_top div:nth-child(2)
	{
		width:68%;
		min-width:0%;
		float:left;
		clear:right;
		margin:auto;
		padding:1%;
		background-color:rgba(50,50,50,1.0);
	}
	
	.loged_form_top div:nth-child(3)
	{
		width:98%;
		min-width:0%;
		clear:both;
		float:left;
		margin:1% auto 0% auto;
		padding:1%;
		background-color:rgba(50,50,50,1.0);
	}
}