var forbiten_data = ["/","(",")",";","'","\"","[","]",",","?","|","!","#","$","%","^","&","*","=","+","`","~"];

function user_login_email()
{
	var input_email = document.forms["login_form"] ["login_email"].value;
	var forbiten_data_len = forbiten_data.length;
	var input_email_len = input_email.length;
	
	for(var i = 0; i < input_email_len; i++)
	{
		for(var s = 0; s < forbiten_data_len; s++)
		{
			console.log(input_email[i])
			if(input_email[i] == forbiten_data[s])
			{
				console.log("3");
				alert("Email must not contain the following (,),/");
				break;
			}
		}
	}
	/*if(input_email == "")
	{
		alert("Name must be filled out");
		return false;
	}*/
}

function user_login_pass()
{
	
}

function user_login()
{
	
}