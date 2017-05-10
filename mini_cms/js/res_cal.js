"use strict";

var date = new Date();

var secBeg = date.getTime();
var secEnd = (secBeg + ((86400000) * 7 * 4));

var days = (((((secEnd - secBeg)/24)/60)/60)/1000);
var week = Math.round(((days/7) - (days/31)));
var month = (week/4);

var prevId = 0;

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
	
	idDiv_01.appendChild(createDiv_01);
	
	createDiv_01.id = "div_cal_con";
	createDiv_01.className = "div_cal_con";
	
	var idDiv_02 = document.getElementById(createDiv_01.id);
	
	for(var i = 1; i <= days; i++)
	{
		var createP_01 = document.createElement('p');
		var textP_01 = document.createTextNode(i);
		var createDiv_02 = document.createElement('div');
		
		createP_01.appendChild(textP_01);
		createDiv_02.appendChild(createP_01);
		idDiv_02.appendChild(createDiv_02);
		
		createDiv_02.id = "div_date_" + i;
		createDiv_02.setAttribute("onclick","setBoxSelection(this.id)");
	}
	
}

function setBoxSelection(newId)
{
	if(prevId == 0)
		prevId = newId;
		
	document.getElementById(newId).style.backgroundColor = "rgba(40,40,40,1)";
	document.getElementById(newId).style.boxShadow = "0px 0px 4px 2.5px rgba(255,143,0,1)";

	if(prevId != newId)
	{
		document.getElementById(prevId).style.backgroundColor = "rgba(20,20,20,1)";
		document.getElementById(prevId).style.boxShadow = "0px 0px 4px 2.5px rgba(0,0,0,0.25)";
	}
	prevId = newId;
}