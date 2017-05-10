<?php
$server_name = "localhost";
$server_user = "root";
$server_password = "";
$prefix = "re2213";
$db_name = "re2213_restaurant_db";
$sql = NULL;

$conn = mysqli_connect($server_name , $server_user , $server_password ) or die("ERROR 00 " . mysqli_connect_error($conn));

$sql = "CREATE DATABASE " . $db_name . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";

mysqli_query($conn , $sql);

if(mysqli_error($conn))
{
	$sql = "DROP DATABASE " . $db_name;
    mysqli_query($conn, $sql) or die("ERROR 01" . mysqli_error($conn));
	$sql = "CREATE DATABASE " . $db_name . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
    mysqli_query($conn, $sql) or die("ERROR 02" . mysqli_error($conn));
}

$sql = "use " . $db_name;
mysqli_query($conn, $sql) or die("ERROR 03" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."_access_level
(
	access_level_id INT AUTO_INCREMENT UNIQUE,
	access_level_title VARCHAR(15) NOT NULL DEFAULT \"ADMIN\",
	access_level_date_created DATETIME NOT NULL DEFAULT NOW(),
	PRIMARY KEY(access_level_id)
);";
mysqli_query($conn, $sql) or die("ERROR 04" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."_page_component_structure
(
	page_component_id INT AUTO_INCREMENT UNIQUE,
	page_component_title VARCHAR(32),
	page_component_date_created DATETIME NOT NULL DEFAULT NOW(),
	access_level_id INT DEFAULT 1,
	include_file_id INT,
	PRIMARY KEY(page_component_id),
	FOREIGN KEY (access_level_id) REFERENCES ".$prefix."_access_level(access_level_id)
);";
mysqli_query($conn, $sql) or die("ERROR 05" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."_file_type
(
	file_type_id INT AUTO_INCREMENT UNIQUE,
	file_type_title VARCHAR(30),
	file_type_extension VARCHAR(5),
	file_type_date_added DATETIME NOT NULL DEFAULT NOW(),
	PRIMARY KEY(file_type_id)
);";
mysqli_query($conn , $sql) or die("ERROR 06" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."_include_file
(
	include_file_id INT AUTO_INCREMENT UNIQUE,
	include_file_title VARCHAR(128),
	include_file_date_upload DATETIME NOT NULL DEFAULT NOW(),
	include_file_path VARCHAR(255),
	page_component_id INT,
	file_type_id INT,
	PRIMARY KEY(include_file_id),
	FOREIGN KEY (page_component_id) REFERENCES ".$prefix."_page_component_structure(page_component_id),
	FOREIGN KEY (file_type_id) REFERENCES ".$prefix."_file_type(file_type_id)
);";
mysqli_query($conn, $sql) or die("ERROR 07" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."_user
(
 user_name VARCHAR(24) NOT NULL UNIQUE,
 user_email VARCHAR(48) NOT NULL UNIQUE,
 user_password VARCHAR(24) NOT NULL UNIQUE,
 user_gender VARCHAR(7) NOT NULL,
 user_desc VARCHAR(255) , 
 user_reg_date DATETIME NOT NULL DEFAULT NOW(),
 user_id INT AUTO_INCREMENT UNIQUE,
 access_level_id INT DEFAULT 3,
 PRIMARY KEY(user_id),
 FOREIGN KEY (access_level_id) REFERENCES ".$prefix."_access_level(access_level_id)
 );";
mysqli_query($conn, $sql) or die("ERROR 08" . mysqli_error($conn));

$sql = " 
CREATE TABLE ".$prefix."_menu_structure
(
    menu_id INT AUTO_INCREMENT NOT NULL UNIQUE,
    menu_date_created DATETIME NOT NULL DEFAULT NOW(),
    menu_title VARCHAR(15),
	page_component_id INT,
	access_level_id INT DEFAULT 1,
    PRIMARY KEY (menu_id),
	FOREIGN KEY(page_component_id) REFERENCES ".$prefix."_page_component_structure(page_component_id),
	FOREIGN KEY (access_level_id) REFERENCES ".$prefix."_access_level(access_level_id)
);";
mysqli_query($conn, $sql) or die("ERROR 09" . mysqli_error($conn));


$sql = "
CREATE TABLE ".$prefix."_submenu_structure
(
    submenu_id INT AUTO_INCREMENT NOT NULL UNIQUE,
    submenu_date_created DATETIME NOT NULL DEFAULT NOW(),
    submenu_title VARCHAR(15),
    menu_id INT,
	access_level_id INT DEFAULT 1,
    PRIMARY KEY (submenu_id),
    FOREIGN KEY (menu_id) REFERENCES ".$prefix."_menu_structure(menu_id),
	FOREIGN KEY (access_level_id) REFERENCES ".$prefix."_access_level(access_level_id)
);";
mysqli_query($conn, $sql) or die("ERROR 10" . mysqli_error($conn));

$sql="
CREATE TABLE ".$prefix."_component_data_image
(
	component_data_image_id INT AUTO_INCREMENT UNIQUE,
	component_data_image_path VARCHAR(100) ,
	component_data_image_upload_date DATETIME NOT NULL DEFAULT NOW(),
	PRIMARY KEY(component_data_image_id)
);";
mysqli_query($conn, $sql) or die("ERROR 11" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."_component_data
(
	component_data_id INT AUTO_INCREMENT UNIQUE,
	component_data_date_creation DATETIME NOT NULL DEFAULT NOW(),
	component_data_image_id INT,
	PRIMARY KEY(component_data_id),
	FOREIGN KEY(component_data_image_id) REFERENCES ".$prefix."_component_data_image(component_data_image_id)
)";
mysqli_query($conn, $sql) or die("ERROR 12" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."_component
(
    component_id INT AUTO_INCREMENT NOT NULL UNIQUE ,
    component_title VARCHAR(25) UNIQUE,
    component_date_created DATETIME NOT NULL DEFAULT NOW(),
    component_file_assosiation VARCHAR(255),
    submenu_id INT,
	page_component_id INT,
	component_data_id INT,
	access_level_id INT DEFAULT 1,
    PRIMARY KEY (component_id),
    FOREIGN KEY (submenu_id) REFERENCES ".$prefix."_submenu_structure(submenu_id),
	FOREIGN KEY (page_component_id) REFERENCES ".$prefix."_page_component_structure(page_component_id),
	FOREIGN KEY (component_data_id) REFERENCES ".$prefix."_component_data(component_data_id),
	FOREIGN KEY (access_level_id) REFERENCES ".$prefix."_access_level(access_level_id)
);";
mysqli_query($conn, $sql) or die("ERROR 13" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."_access_level (access_level_title) VALUES 
(\"ADMIN\") , 
(\"PUBLIC\") , 
(\"GUEST\");";
mysqli_query($conn, $sql) or die("ERROR 14" . mysqli_error($conn));

$sql = "
INSERT INTO ".$prefix."_file_type(file_type_title , file_type_extension) VALUES 
(\"hyper text markup language\" , \"html\"),
(\"hypertext preprocessor\" , \"php\"),
(\"javascript\" , \"js\"),
(\"casceding style sheet\" , \"css\");";
mysqli_query($conn , $sql)or die("ERROR 15" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."_page_component_structure (page_component_title , include_file_id , access_level_id) VALUES 
(\"header\",15, 3) , 
(\"menu\",16, 3) , 
(\"main\",17, 3) , 
(\"footer\",18, 3);";
mysqli_query($conn , $sql) or die("ERROR 16" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."_include_file (include_file_title, file_type_id , include_file_path, page_component_id) VALUES 
(\"desktop_style\",4, \"../css/site_style/desktop_style/desktop_style.css\", 1),
(\"header\",4, \"../css/site_style/desktop_style/header.css\", 1),
(\"menu\",4, \"../css/site_style/desktop_style/menu.css\", 1),
(\"main\",4, \"../css/site_style/desktop_style/main.css\", 1),
(\"footer\",4, \"../css/site_style/desktop_style/footer.css\", 1),
(\"home.css\",4, \"../css/site_style/desktop_style/component_style/home.css\", 1),
(\"about_us\",4, \"../css/site_style/desktop_style/component_style/about_us.css\", 1),
(\"contact\",4, \"../css/site_style/desktop_style/component_style/contact.css\", 1),
(\"catalog\",4, \"../css/site_style/desktop_style/component_style/catalog.css\", 1),
(\"faculty\",4, \"../css/site_style/desktop_style/component_style/faculty.css\", 1),
(\"login_form\",4, \"../css/site_style/desktop_style/component_style/login_form.css\", 1),
(\"register_form\",4, \"../css/site_style/desktop_style/component_style/register_form.css\", 1),
(\"db_conn\",2, \"site_struct/document_data/db_conn.php\", 1),
(\"document_data\",2, \"site_struct/data_struct/document_data/document_data.php\" , 1),
(\"header\",2, \"site_struct/data_struct/header.php\" , NULL),
(\"menu\",2, \"site_struct/data_struct/menu.php\" , NULL),
(\"main\",2, \"site_struct/data_struct/main.php\" , NULL),
(\"footer\",2, \"site_struct/data_struct/footer.php\" , NULL),
(\"home\",2,\"site_struct/data_struct/component/home.php\", 3),
(\"about_us\",2, \"site_struct/data_struct/component/about_us.php\", 3),
(\"contact\",2, \"site_struct/data_struct/component/catalog.php\", 3),
(\"catalog\",2, \"site_struct/data_struct/component/about_us.php\", 3),
(\"reservation\",2, \"site_struct/data_struct/component/reservation.php\", 3),
(\"faculty\",2, \"site_struct/data_struct/component/faculty.php\", 3),
(\"registration\",2, \"site_struct/data_struct/component/registration.php\", 3),
(\"forgot_password\",2, \"site_struct/data_struct/component/forgot_password.php\", 3);";
mysqli_query($conn , $sql)or die("ERROR 17" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."_menu_structure (menu_title , page_component_id , access_level_id) VALUES
 (\"menu1\" , 2 , 3) , 
 (\"menu2\" , 2 , 3),
 (\"menu3\" , 2 , 3);";
mysqli_query($conn, $sql) or die("ERROR 18" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."_submenu_structure(submenu_title,menu_id , access_level_id) VALUES
 (\"Home\",1 , 3) , 
 (\"About us\",1 , 3) , 
 (\"Contact\",1 , 3) , 
 (\"Catalog\",2 , 3) , 
 (\"Reservation\",2 , 2) , 
 (\"Faculty\",2 , 3),
 (\"Test\",3 , 3),
 (\"Test2\",3 , 3),
 (\"Test3\",3 , 3);";
mysqli_query($conn, $sql) or die("ERROR 19" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."_component (component_title , component_file_assosiation , submenu_id , page_component_id , component_data_id , access_level_id) VALUES
 (\"Home\", \"site_struct/data_struct/components/home.php\" , 1, 3, NULL,2), 
 (\"About us\", \"site_struct/data_struct/components/about_us.php\", 2, 3, NULL, 2),
 (\"Contact\", \"site_struct/data_struct/components/contact.php\", 3, 3, NULL, 2),
 (\"Catalog\", \"site_struct/data_struct/components/catalog.php\", 4, 3, NULL, 2),
 (\"Reservation\", \"site_struct/data_struct/components/reservation.php\", 5, 3, NULL, 2),
 (\"Faculty\", \"site_struct/data_struct/components/faculty.php\", 6, 3, NULL, 2);";
 mysqli_query($conn, $sql) or die("ERROR 20" . mysqli_error($conn));

 $sql = "INSERT INTO ".$prefix."_user(access_level_id , user_name , user_email  , user_password , user_gender) VALUES
 (1 , \"john\" , \"john@gmail.com\" , \"jogn123\" , \"male\"),
 (2 , \"marie\" , \"marie@gmail.com\" , \"marie123\" , \"female\"),
 (2 , \"vedel\" , \"vedel@gmail.com\" , \"vedel123\" , \"female\");";
 mysqli_query($conn, $sql) or die("ERROR 21" . mysqli_error($conn));
 
mysqli_close($conn) or die("ERROR 22" . mysqli_error($conn));

$sql = NULL;
$conn = NULL;
echo "<h1 style = 'text-align:center; color:green;';>Installation succesfull</h1>";
?>