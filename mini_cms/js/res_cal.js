"use strict";

var date = new Date();

//var milBeg = date.getTime();

//var milEnd = (milBeg + ((86400000) * 7 * 4));

//var days = (((((milEnd - milBeg)/24)/60)/60)/1000);
var days = 31;
//var week = Math.round(((days/7) - (days/31)));
//var month = (week/4);

var prevId = 0;
var oldIdInput_01 = 0;

var months = ["January","February","Mars","April","May","June","Julie","August","September","October","November","December"];

var hours = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,15,16,17,18,19,20,21,22,23];
var minutes = [0,15,30,45];

function resCall(){}
function dateCheck(){}
function createCallChilds(){}
function setBoxSelection(){}

function resCall()
{
	//console.log("months : " + month);
	//console.log("weeks : " + week);
	//console.log("days : " + days);
	
	var idDiv_01 = 0;

	if((idDiv_01 = document.getElementById('res_cal')))
		createCallChilds();
}

function createCallChilds()
{
	var hoursArrayLen  = hours.length;
	var minutesArrayLen = minutes.length;
	
	var idDiv_02 = document.getElementById('res_cal');
	
	var createDiv_01 = document.createElement('div');
	var createDiv_02 = document.createElement('div');
	var createSel_01 = 0;
	var createOpt_01 = 0;
	var createH_01 = 0;
	var createP_01 = 0;
	var createI_01 = 0;
	var createText_01 = 0;
	
	//idDiv_01.appendChild(createTd_01);
	//createTd_01.appendChild(createDiv_01);
	idDiv_02.appendChild(createDiv_01);
	createDiv_01.appendChild(createDiv_02);
	
	createH_01 = document.createElement('h3');
	createDiv_02.appendChild(createH_01);
	createText_01 = document.createTextNode(months[date.getUTCMonth()] + " " + date.getUTCFullYear());
	createH_01.appendChild(createText_01);
	
	createSel_01 = document.createElement('select');
	createDiv_02.appendChild(createSel_01);

	
	for(var i = 0; i < minutesArrayLen; i++)
	{
		createOpt_01 = document.createElement('option');
		createP_01 = document.createElement('p');
		createText_01 = document.createTextNode(minutes[i]);
		
		createSel_01.appendChild(createOpt_01);
		createOpt_01.appendChild(createP_01);
		createP_01.appendChild(createText_01);
	}
	
	createSel_01 = document.createElement('select');
	createDiv_02.appendChild(createSel_01);
	
	for(var i = 0; i < hoursArrayLen; i++)
	{
		createOpt_01 = document.createElement('option');
		createP_01 = document.createElement('p');
		createText_01 = document.createTextNode(hours[i]);
		
		createSel_01.appendChild(createOpt_01);
		createOpt_01.setAttribute("value",hours[i]);
		createOpt_01.appendChild(createP_01);
		createP_01.appendChild(createText_01);
	}
	
	createDiv_02 = document.createElement('div');
	createDiv_01.appendChild(createDiv_02);
	
	createDiv_02.id = "div_cal_con";
	createDiv_02.className = "div_cal_con";
	
	dateCheck();
	var createDiv_03 = 0;
	for(var i = 1; i <= days; i++)
	{
		//createI_01 = document.createElement('input');
		createP_01 = document.createElement('p');
		createText_01 = document.createTextNode(i);
		createDiv_03 = document.createElement('div');
		
		createDiv_02.appendChild(createDiv_03);
		createDiv_03.appendChild(createP_01);
		createP_01.appendChild(createText_01);
		//createDiv_03.appendChild(createI_01);
		
		createDiv_03.id = "div_date_" + i;
		createDiv_03.setAttribute("onclick","setBoxSelection(this.id)");
		createDiv_03.setAttribute("value",i);
		
	}
	createDiv_02 = document.createElement('div');
	
	createDiv_01.appendChild(createDiv_02);
	createI_01 = document.createElement('input');
	createDiv_02.appendChild(createI_01);
	
	createI_01.setAttribute("id","res_date_id");
	createI_01.setAttribute("type","text");
	createI_01.setAttribute("name","res_date");
	createI_01.disabled = true;
	createI_01.setAttribute("value",(date.getUTCMonth()  + 1) + "/" + date.getUTCFullYear());
}

function setBoxSelection(newId)
{
	if(prevId == 0)
		prevId = newId;
	
	var idDiv_03 = document.getElementById(newId);
	var idDiv_04 = document.getElementById(prevId);
	var idInput_01 = document.getElementById("res_date_id");
		
	document.getElementById(newId).style.backgroundColor = "rgba(40,40,40,1)";
	document.getElementById(newId).style.boxShadow = "0px 0px 4px 2.5px rgba(255,143,0,1.0)";
	idInput_01.setAttribute("value",idDiv_03.getAttribute("value") + "/" +(date.getUTCMonth()  + 1) + "/" + date.getUTCFullYear());
	
	if(prevId != newId)
	{
		document.getElementById(prevId).style.backgroundColor = "rgba(20,20,20,1)";
		document.getElementById(prevId).style.boxShadow = "0px 0px 4px 2.5px rgba(0,0,0,0.25)";
		oldIdInput_01.removeAttribute("name");
	}	
	
	prevId = newId;
	oldIdInput_01 = idInput_01;
}

function dateCheck()
{
	switch(date.getUTCMonth())
	{
		case 1:
			if(date.getUTCFullYear()%4 == 0)
				days = days - 3;
			else
				days = days - 2;
			console.log("1 : " + date.getUTCMonth());
			break;
		case 3:
			days = days - 1;
			console.log("3");
			break;
		case 5:
			days = days - 1;
			console.log("5");
			break;
		case 8:
			days = days - 1;
			console.log("8");
			break;
		case 10:
			days = days - 1;
			console.log("10");
			break;
		default:
			console.log("none");
		
	}
}