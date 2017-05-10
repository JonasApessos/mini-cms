"use strict";

var date = new Date();

var secBeg = date.getTime();
var secEnd = (secBeg + ((86400000) * 7 * 4));

var days = (((((secEnd - secBeg)/24)/60)/60)/1000);
var week = Math.round(((days/7) - (days/31)));
var month = (week/4);

var prevId = 0;
var oldIdInput_01 = 0;
var hours = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,15,16,17,18,19,20,21,22,23,24];
var minutes = [0,30];

function resCall(){}
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
	var idDiv_01 = document.getElementById('res_cal')
	
	var createDiv_01 = document.createElement('div');
	var createDiv_02 = document.createElement('div');
	var createDiv_03 = document.createElement('div');
	var createSel_01 = document.createElement('select');
	var createSel_02 = document.createElement('select');
	

	
	var createTd_01 = document.createElement('td');
	
	//idDiv_01.appendChild(createTd_01);
	//createTd_01.appendChild(createDiv_01);
	idDiv_01.appendChild(createDiv_01);
	createDiv_01.appendChild(createDiv_02);
	
	createDiv_02.appendChild(createSel_02);
	createDiv_02.appendChild(createSel_01);
	
	for(var i = 0; i < hours.length; i++)
	{
		var createOpt_01 = document.createElement('option');
		var createP_01 = document.createElement('p');
		var createText_01 = document.createTextNode(hours[i]);
		
		createSel_01.appendChild(createOpt_01);
		createOpt_01.setAttribute("value",hours[i]);
		createOpt_01.appendChild(createP_01);
		createP_01.appendChild(createText_01);
	}
	
	for(var i = 0; i < minutes.length; i++)
	{
		var createOpt_01 = document.createElement('option');
		var createP_01 = document.createElement('p');
		var createText_01 = document.createTextNode(minutes[i]);
		
		createSel_02.appendChild(createOpt_01);
		createOpt_01.appendChild(createP_01);
		createP_01.appendChild(createText_01);
	}
	
	createDiv_01.appendChild(createDiv_03);
	
	createDiv_03.id = "div_cal_con";
	createDiv_03.className = "div_cal_con";
	
	for(var i = 1; i <= days; i++)
	{
		var createI_01 = document.createElement('input');
		var createP_01 = document.createElement('p');
		var textP_01 = document.createTextNode(i);
		var createDiv_04 = document.createElement('div');
		
		createP_01.appendChild(textP_01);
		createDiv_04.appendChild(createP_01);
		createDiv_03.appendChild(createDiv_04);
		createDiv_04.appendChild(createI_01);
		
		createDiv_04.id = "div_date_" + i;
		createDiv_04.setAttribute("onclick","setBoxSelection(this.id)");
		createDiv_04.setAttribute("value",i);
		
		createI_01.setAttribute("id","iDate_"+i);
		createI_01.setAttribute("type","hidden");
		createI_01.setAttribute("value",i);
	}
	
}

function setBoxSelection(newId)
{
	if(prevId == 0)
		prevId = newId;
	
	var idDiv_03 = document.getElementById(newId);
	var idDiv_04 = document.getElementById(prevId);
	var idInput_01 = document.getElementById("iDate_"+idDiv_03.getAttribute("value"));
		
	document.getElementById(newId).style.backgroundColor = "rgba(40,40,40,1)";
	document.getElementById(newId).style.boxShadow = "0px 0px 4px 2.5px rgba(255,143,0,1.0)";
	idInput_01.setAttribute("name","day_sel");
	
	if(prevId != newId)
	{
		document.getElementById(prevId).style.backgroundColor = "rgba(20,20,20,1)";
		document.getElementById(prevId).style.boxShadow = "0px 0px 4px 2.5px rgba(0,0,0,0.25)";
		oldIdInput_01.removeAttribute("name");
	}	
	
	prevId = newId;
	oldIdInput_01 = idInput_01;
}