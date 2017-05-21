"use strict";

function selectTable(tableId)
{
	var id = document.getElementById(tableId);
	var tableValue = document.getElementById(tableId).childNodes[0].value;
	var tableListId = document.getElementById("table_list");
	
	var tableIdString = String(tableId);
	
	if(parseInt(tableValue))
	{
		id.style.boxShadow = "0px 0px 10px 2px rgba(0,0,0,0.25)";
		id.style.backgroundColor = "rgba(30,30,30,1.0)";
		id.childNodes[0].value = 0;
		
		var newtext = (tableIdString.replace("table_","")) + ",";
		
		var newtext2 = tableListId.value;
		newtext2 = newtext2.replace((newtext),"");
		
		tableListId.value = newtext2;
	}
	else
	{
		id.style.boxShadow = "0px 0px 10px 2px rgba(255,140,0,1.0)";
		id.style.backgroundColor = "rgba(50,50,50,1.0)";
		id.childNodes[0].value = 1;
		tableListId.value += (tableIdString.replace("table_","")) + ",";
	}
}