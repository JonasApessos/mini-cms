function nameFieldCheck(input_value){}
function peopleFieldCheck(input_value){}

function nameFieldCheck(input_value)
{
	var error = document.getElementsByClassName("type_error");
	if(input_value.length == 0 || input_value.length > 32)
	{
		error[0].display = true;
		error[0].innerHTML = "name field cannot be empty and higher than 32 characters";
	}
	else
	{
		error[0].innerHTML = "";
		error[0].display = false;
	}
}

function peopleFieldCheck(input_value)
{
	var error = document.getElementsByClassName("type_error")[0];
	if(input_value.length == 0 || input_value > 100 || input_value < 1)
		error.innerHTML = "There cannot be fiewer than 1 or higher than 100 people in the people field";
	else
		error.innerHTML = "";
}