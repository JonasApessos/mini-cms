function image_expansion(image_id)
{
	var image = document.getElementById(image_id);
	
	if(image.width <= "100" || image.width <= "50" )
	{
		image.style.width = "25%";
		image.style.height = "auto";
        console.log("1 -> width : " + image.width + " height : " + image.width);
	}
	else
	{
		image.style.width = "5%";
		image.style.height = "auto";
		console.log("2 -> width : " + image.width + " height : " + image.width);
	}
}