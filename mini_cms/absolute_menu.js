var rotated = true;
function image_rotate()
{
	switch(rotated)
	{
		case true:
		    document.getElementById("menu_image").className = "image_transition";
			document.getElementById("absolute_menu_window").className = "absolute_menu_clicked";
		    rotated = false;
			break;
		case false:
		    document.getElementById("menu_image").className = "image_back";
			document.getElementById("absolute_menu_window").className = "absolute_menu";
		    rotated = true;
			break;
		default:
		    Console.log("error 001");
	}
}