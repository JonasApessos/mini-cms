<?php
	header("Content-type:text/css; charset: UTF-8");
	include "../php_style/login_form_style_variable.php";
?>
@media screen and (min-width:480px)
{
.login_form_top
	{
		width:25%;
		height:auto;
		background-color:<?php echo $form_background_color; ?>;
		margin:1% auto;
		padding:1%;
		color:<?php echo $text_color;?>;
		float:right;
		clear:right;
		border:<?php echo $border_width."px solid "; echo $border_normal_color; ?>;
		transition: border-color <?php echo $animation_time_transition.'s' ?>;
	}
	
	.login_form_top:hover
	{
		border-color:<?php echo $border_hover_color; ?>;
	}
	
	.login_form_top table
	{
		margin:auto;
	}
	
	.login_form_top table tr td input[type = text]
	{
		width:75%;
		background-color:<?php echo $form_input_background_color;?>;
		border:<?php echo $border_width."px "?> solid white;
		border-color:<?php echo $border_input_color; ?>;
		transition: border-color <?php echo $animation_time_transition.'s' ?> , background-color <?php echo $animation_time_transition.'s' ?>;
	}
	
	.login_form_top table tr td input[type = text]:hover
	{
		border-color:<?php echo $border_hover_color; ?>;
		background-color:<?php echo $form_input_hover_background_color;?>;
	}
	
	.login_form_top table tr td input[type = password]
	{
		width:75%;
		background-color:<?php echo $form_input_background_color;?>;
		border:<?php echo $border_width."px "?> solid white;
		border-color:<?php echo $border_input_color; ?>;
		transition: border-color <?php echo $animation_time_transition.'s' ?> , background-color <?php echo $animation_time_transition.'s' ?>;
	}
	
	.login_form_top table tr td input[type = password]:hover
	{
		border-color:<?php echo $border_hover_color; ?>;
		background-color:<?php echo $form_input_hover_background_color;?>;
	}
	
	.login_form_top table tr td input[type = submit]
	{
		background-color:<?php echo $form_input_background_color; ?>;
		border:<?php echo $border_width."px "?> solid white;
		border-color:<?php echo $form_input_hover_background_color; ?>;
	}
}