"use strict";

//init important data
var date = new Date();

var days = 31;

var prevId = 0;
var oldIdInput_01 = 0;

var idDiv_03 = 0;

var idInput_01 = 0;

var dateMonthAdded = 0;

var months = ["January","February","Mars","April","May","June","Julie","August","September","October","November","December"];

var hours = [9,10,11,12,13,14,15,15,16,17,18,19,20,21,22,23];
var minutes = [0,30];


/*
function resCall(){}
function dateCheck(){}
function createCallChilds(){}
function setMinutes(){}
function setHours(){}
function setDays(){}
function setBoxSelection(){}
function updateForm(){}
*/
//-------------------------------------------------------------

//set calander
function resCall()
{
	var idDiv_01 = 0;

	if((idDiv_01 = document.getElementById('res_cal')))
		createCallChilds(idDiv_01);
}

function createCallChilds(idDiv_01)
{		
	var createDiv_01 = document.createElement('div');
	var createDiv_02 = document.createElement('div');
	var createSel_01 = 0;
	var createH_01 = 0;
	var createI_01 = 0;
	var createText_01 = 0;
	
	idDiv_01.appendChild(createDiv_01);
	createDiv_01.appendChild(createDiv_02);
	
	createH_01 = document.createElement('h3');
	createDiv_02.appendChild(createH_01); 
	createText_01 = document.createTextNode(months[date.getUTCMonth() + dateMonthAdded] + " " + date.getUTCFullYear());
	createH_01.appendChild(createText_01);
	
	createSel_01 = document.createElement('select');
	createDiv_02.appendChild(createSel_01);
	createSel_01.id = "minutes_id";

	
	setMinutes(createSel_01);//set minutes
	
	createSel_01 = document.createElement('select');
	createDiv_02.appendChild(createSel_01);
	createSel_01.id = "hours_id";
	
	setHours(createSel_01);//set hours
	
	createDiv_02 = document.createElement('div');
	createDiv_01.appendChild(createDiv_02);
	
	createDiv_02.id = "div_cal_con";
	createDiv_02.className = "div_cal_con";
	
	dateCheck();//checking month days
	
	setDays(createDiv_02);//set days
	
	createDiv_02 = document.createElement('div');
	
	createDiv_01.appendChild(createDiv_02);
	createI_01 = document.createElement('input');
	createDiv_02.appendChild(createI_01);
	
	createI_01.setAttribute("id","res_date_id");
	createI_01.setAttribute("type","text");
	createI_01.setAttribute("name","res_date");

	createI_01.setAttribute("value",date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1 + dateMonthAdded) + " " + hours[document.getElementById("hours_id").selectedIndex] + ":" + minutes[document.getElementById("minutes_id").selectedIndex] + ":" + "0" + "0");
	createI_01.readOnly = true;
}

function setMinutes(selId)//setting minutes of the calandar
{
	var minutesArrayLen = minutes.length;
	var createElOb_01 = 0;
	var createElOb_02 = 0;
	for(var i = 0; i < minutesArrayLen; i++)
	{
		createElOb_01 = document.createElement('option');
		createElOb_02 = document.createElement('p');
		
		selId.appendChild(createElOb_01);
		createElOb_01.appendChild(createElOb_02);
		createElOb_01 = document.createTextNode(minutes[i]);
		createElOb_02.appendChild(createElOb_01);
	}
}

function setHours(selId)//setting hours of the calandar
{
	var hoursArrayLen  = hours.length;
	var createElOb_01 = 0;
	var createElOb_02 = 0;
	for(var i = 0; i < hoursArrayLen; i++)
	{
		createElOb_01 = document.createElement('option');
		createElOb_02 = document.createElement('p');
				
		selId.appendChild(createElOb_01);
		createElOb_01.setAttribute("value",hours[i]);
		createElOb_01.appendChild(createElOb_02);
		createElOb_01 = document.createTextNode(hours[i]);
		createElOb_02.appendChild(createElOb_01);
	}
}

function setDays(divId)//setting days of the calander
{
	var createElOb_01 = 0;
	var createElOb_02 = 0;
	for(var i = date.getUTCDate() + 1; i <= days; i++)
	{
		createElOb_01 = document.createElement('div');
		createElOb_02 = document.createElement('p');
		
		divId.appendChild(createElOb_01);
		createElOb_01.appendChild(createElOb_02);
		
		createElOb_01.id = "div_date_" + i;
		createElOb_01.setAttribute("onclick","setBoxSelection(this.id)");
		createElOb_01.setAttribute("value",i);
		
		createElOb_01 = document.createTextNode(i);
		createElOb_02.appendChild(createElOb_01);		
	}
}

function setBoxSelection(newId)//on click to element , set and update form input
{
	
	if(prevId == 0)
		prevId = newId;
	
	idDiv_03 = document.getElementById(newId);

	idInput_01 = document.getElementById("res_date_id");
		
	document.getElementById(newId).style.backgroundColor = "rgba(40,40,40,1)";
	document.getElementById(newId).style.boxShadow = "0px 0px 4px 2.5px rgba(255,143,0,1.0)";
	
	idInput_01.defaultValue = (date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1 + dateMonthAdded) + "-" + idDiv_03.getAttribute("value") + " " + hours[document.getElementById("hours_id").selectedIndex] + ":" + minutes[document.getElementById("minutes_id").selectedIndex] + ":" + "0");
	
	if(prevId != newId)
	{
		document.getElementById(prevId).style.backgroundColor = "rgba(20,20,20,1)";
		document.getElementById(prevId).style.boxShadow = "0px 0px 4px 2.5px rgba(0,0,0,0.25)";

	}	
	
	prevId = newId;
}

//check for days of month
function dateCheck()
{
	if(date.getUTCMonth() + dateMonthAdded > date.getUTCMonth())
	{
		date.setUTCDate(1);
	}
	switch(date.getUTCMonth())
	{
		case 1://feb is a special month where every 4 years the final year is allways dividable with 4 and gets 29 days instead of 28
			if(date.getUTCFullYear()%4 == 0)
				days = days - 3;
			else
				days = days - 2;
			break;
		case 3://april
			days = days - 1;
			break;
		case 5://june
			days = days - 1;
			break;
		case 8://sept
			days = days - 1;
			break;
		case 10://nov
			days = days - 1;
			break;
	}
}


function updateForm()//updates on form input changes
{	
	if(idDiv_03 != 0)
		idInput_01.defaultValue = (date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1 + dateMonthAdded) + "-" + idDiv_03.getAttribute("value") + " " + hours[document.getElementById("hours_id").selectedIndex] + ":" + minutes[document.getElementById("minutes_id").selectedIndex] + ":" + "0"+"0");
}