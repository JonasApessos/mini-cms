"use strict";

var date = new Date();

var secBeg = date.getTime();
var secEnd = (secBeg + ((86400000) * 7 * 4));

var days = (((((secEnd - secBeg)/24)/60)/60)/1000);
var week = Math.round(((days/7) - (days/31)));
var month = (week/4);


function res_cal()
{
	console.log("months : " + month);
	console.log("weeks : " + week);
	console.log("days : " + days);
	//var class_child_elem = document.createElement("div");

	var div_create_01 = document.createElement('div');
	var div_id_01 = document.getElementById('res_cal');
	div_id_01.appendChild(div_create_01);
	
	div_create_01.id = "div_cal_con";
	div_create_01.className = "div_cal_con";
	
	var div_id_02 = document.getElementById(div_create_01.id);
	
	console.log(div_id_02);
	
	for(var i = 1; i <= days; i++)
	{
		var p_create_01 = document.createElement('p');
		var p_text_01 = document.createTextNode(i);
		var div_create_02 = document.createElement('div');
		
		p_create_01.appendChild(p_text_01);
		div_create_02.appendChild(p_create_01);
		div_id_02.appendChild(div_create_02);
		
		div_create_02.id = "div_date_" + i;
		div_create_02.setAttribute("onclick","box_selected(this.id)");
	}
	
	
}


var prev_id = null;


function box_selected(id)
{
	if(prev_id == null)
		prev_id = id;
		
	document.getElementById(id).style.backgroundColor = "rgba(40,40,40,1)";
	document.getElementById(id).style.boxShadow = "0px 0px 2px 1px rgba(255,143,0,1)";

	if(prev_id != id)
	{
		document.getElementById(prev_id).style.backgroundColor = "rgba(20,20,20,1)";
		document.getElementById(prev_id).style.boxShadow = "0px 0px 2px 1px rgba(255,143,0,0)";
	}

	prev_id = id;
}