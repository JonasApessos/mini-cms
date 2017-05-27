<?php

echo "<div class = \"".$catalog_class."\">";

$sql = "
SELECT re2213_category.category_id , re2213_category.category_title
FROM re2213_category;";
$prod_cad_rows = mysqli_query($conn,$sql) or die ("ERROR 21" . mysqli_error($conn));

foreach($prod_cad_rows as $prod_cad_row => $prod_cad_data)
{
	echo "<h3>".$prod_cad_data['category_title']."</h3>";
	$sql = "
	SELECT re2213_product.product_id, re2213_product.product_title , re2213_product.product_desc , re2213_product.product_price
	FROM re2213_product
	WHERE re2213_product.category_id = ".$prod_cad_data['category_id'].";";
	$prod_rows = mysqli_query($conn,$sql) or die ("ERROR 22" . mysqli_error($conn));
	
	
	foreach($prod_rows as $prod_row => $prod_data)
	{
		$sql = 
		"SELECT re2213_compDataImg.compDataImg_path 
		FROM re2213_product,re2213_compDataImg 
		WHERE re2213_product.compDataImg_id = re2213_compdataimg.compDataImg_id 
		AND re2213_product.product_id  = ".$prod_data['product_id']."";
		
		$prod_img_rows = mysqli_query($conn,$sql) or die ("ERROR 23" . mysqli_error($conn));
		
		$prod_img_row = mysqli_fetch_assoc($prod_img_rows);
		
		echo "<div>";

		echo "<img src=\"".$prod_img_row['compDataImg_path']."\" width=\"100px\" alt = \"dishe_001\" >";

		echo "<div>";
		echo "<p>".$prod_data['product_desc']."</p>";
		echo "</div>";

		echo "<div>";
		echo "<h3>PRICE: ".$prod_data['product_price']."</h3>";
		echo "</div>";

		echo "</div>";
	}
}
echo "</div>";
 
?>