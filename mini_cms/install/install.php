<?php
/*
LEGENDS///////////////////////////////////////////////////////
1) Every custom component from foreign key start at the index of 2 and above ,
 1 is used for the base mechanics of the mini-platform
-quote "all else is a form of beauty"
 
2) A prefix is used under the variable $prefix , it is good to use a custom prefix when creating the DB

3) DO NOT SET anything to a index of 0 , unfortunately the sql language is kinda buggy , using the data index 0 on a 
foreign key will result in a sql error , as of now there was no time to find a solution to the problem (even accessing the 
C files of the DB)

4) If you wish to hide elements from view from anyone set them to NULL , warning in future releases this method will be
deprecated 

5) The structure of the program follows monolithic structural logic


STRUCTURE LOGIC////////////////////////////////////////////////////////////////////////////
1) All component and structure of the web page are secured using the access_level , choose the access level of your custom
component to set on who(user) you which to be able to see the custom component .
You can change the base access_levels or add new.

2) All body logic component goes to the 1 index of every foreign key , if you which to add more than the base components on the body , you will have to set them with the index of 1. 
WARNING the structure follows monolithic structure , that means there will have to be a hierarchical and order structure between components -> /IN FUTURE RELEASES THIS METHOD MAY BE DEPRECATED OR TRANSFORMED\

3) All files have only been registered by there file path from the localhost's index , to set a specific file to be called by the site you will have to include it in the library path as a new path for the site to add in the specific location.

4) Components can be set to be inserted into there parents.
*/





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
CREATE TABLE ".$prefix."_file_type
(
	file_type_id INT AUTO_INCREMENT UNIQUE,
	file_type_title VARCHAR(30),
	file_type_extension VARCHAR(5),
	file_type_date_created DATETIME NOT NULL DEFAULT NOW(),
	PRIMARY KEY(file_type_id)
);";
mysqli_query($conn , $sql) or die("ERROR 05" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."_user
(
 user_name VARCHAR(24) NOT NULL UNIQUE,
 user_email VARCHAR(48) NOT NULL UNIQUE,
 user_password VARCHAR(24) NOT NULL UNIQUE,
 user_gender VARCHAR(7) NOT NULL,
 user_desc VARCHAR(255) , 
 user_date_created DATETIME NOT NULL DEFAULT NOW(),
 user_id INT AUTO_INCREMENT UNIQUE,
 access_level_id INT DEFAULT 3 NOT NULL,
 PRIMARY KEY(user_id),
 FOREIGN KEY (access_level_id) REFERENCES ".$prefix."_access_level(access_level_id)
 );";
mysqli_query($conn, $sql) or die("ERROR 06" . mysqli_error($conn));

$sql = " 
CREATE TABLE ".$prefix."_menu_structure
(
    menu_id INT AUTO_INCREMENT NOT NULL UNIQUE,
    menu_date_created DATETIME NOT NULL DEFAULT NOW(),
    menu_title VARCHAR(15),
	page_component_id INT DEFAULT 1 NOT NULL,
	access_level_id INT DEFAULT 1 NOT NULL,
    PRIMARY KEY (menu_id),
	FOREIGN KEY (access_level_id) REFERENCES ".$prefix."_access_level(access_level_id)
);";
mysqli_query($conn, $sql) or die("ERROR 07" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."_submenu_structure
(
    submenu_id INT AUTO_INCREMENT NOT NULL,
    submenu_date_created DATETIME NOT NULL DEFAULT NOW(),
    submenu_title VARCHAR(15),
    menu_id INT DEFAULT 1 NOT NULL,
	access_level_id INT DEFAULT 1 NOT NULL,
    PRIMARY KEY (submenu_id),
    FOREIGN KEY (menu_id) REFERENCES ".$prefix."_menu_structure(menu_id),
	FOREIGN KEY (access_level_id) REFERENCES ".$prefix."_access_level(access_level_id)
);";
mysqli_query($conn, $sql) or die("ERROR 08" . mysqli_error($conn));

$sql="
CREATE TABLE ".$prefix."_component_data_image
(
	component_data_image_id INT AUTO_INCREMENT UNIQUE,
	component_data_image_path VARCHAR(50) ,
	component_data_image_date_created DATETIME NOT NULL DEFAULT NOW(),
	file_type_id INT,
	PRIMARY KEY(component_data_image_id),
	FOREIGN KEY(file_type_id) REFERENCES ".$prefix."_file_type(file_type_id)
);";
mysqli_query($conn, $sql) or die("ERROR 09" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."_component_data
(
	component_data_id INT AUTO_INCREMENT UNIQUE,
	component_data_title VARCHAR(32) NOT NULL,
	component_data_date_created DATETIME NOT NULL DEFAULT NOW(),
	component_data_image_id INT DEFAULT 1,
	access_level_id INT DEFAULT 1,
	PRIMARY KEY(component_data_id),
	FOREIGN KEY(component_data_image_id) REFERENCES ".$prefix."_component_data_image(component_data_image_id),
	FOREIGN KEY(access_level_id) REFERENCES ".$prefix."_access_level(access_level_id)
)";
mysqli_query($conn, $sql) or die("ERROR 10" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."_include_file
(
	include_file_id INT AUTO_INCREMENT UNIQUE,
	include_file_title VARCHAR(64),
	include_file_date_created DATETIME NOT NULL DEFAULT NOW(),
	include_file_path VARCHAR(255),
	page_component_id INT DEFAULT 1 NOT NULL,
	file_type_id INT DEFAULT 1 NOT NULL,
	PRIMARY KEY(include_file_id),
	FOREIGN KEY (file_type_id) REFERENCES ".$prefix."_file_type(file_type_id)
);";
mysqli_query($conn, $sql) or die("ERROR 11" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."_page_component_structure
(
	page_component_id INT AUTO_INCREMENT UNIQUE,
	page_component_title VARCHAR(32),
	page_component_date_created DATETIME NOT NULL DEFAULT NOW(),
	access_level_id INT DEFAULT 1 NOT NULL,
	include_file_id INT,
	submenu_id INT DEFAULT 1,
	component_data_id INT DEFAULT 1,
	PRIMARY KEY(page_component_id),
	FOREIGN KEY (access_level_id) REFERENCES ".$prefix."_access_level(access_level_id),
	FOREIGN KEY (submenu_id) REFERENCES ".$prefix."_submenu_structure(submenu_id),
	FOREIGN KEY (component_data_id) REFERENCES ".$prefix."_component_data(component_data_id),
	FOREIGN KEY (include_file_id) REFERENCES ".$prefix."_include_file(include_file_id)
);";
mysqli_query($conn, $sql) or die("ERROR 12" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."_access_level (access_level_title) VALUES 
(\"ADMIN\") , 
(\"PUBLIC\") , 
(\"GUEST\");";
mysqli_query($conn, $sql) or die("ERROR 13" . mysqli_error($conn));

$sql = "
INSERT INTO ".$prefix."_file_type(file_type_title , file_type_extension) VALUES 
(\"hyper text markup language\" , \"html\"),
(\"hypertext preprocessor\" , \"php\"),
(\"javascript\" , \"js\"),
(\"casceding style sheet\" , \"css\"),
(\"Joint Photographic Expert Group\" , \"jpeg\"),
(\"Portable Network Graphics\" , \"png\");";
mysqli_query($conn , $sql)or die("ERROR 14" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."_menu_structure (menu_title , page_component_id , access_level_id) VALUES
(\"menu0\",1,3),
(\"menu1\",2,3), 
(\"menu2\",2,3),
(\"menu3\",2,1);";
mysqli_query($conn, $sql) or die("ERROR 15" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."_submenu_structure(submenu_title,menu_id , access_level_id) VALUES
 (\"Body\",1,3),
 (\"Home\",2 , 3) , 
 (\"About us\",2 , 3) , 
 (\"Contact\",2 , 3) , 
 (\"Catalog\",3 , 3) , 
 (\"Reservation\",3 , 2) , 
 (\"Faculty\",3 , 3),
 (\"Test\",4 , 1),
 (\"Test2\",4 , 1),
 (\"Test3\",4 , 1);";
mysqli_query($conn, $sql) or die("ERROR 16" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."_include_file (include_file_title, file_type_id , include_file_path, page_component_id) VALUES 
(\"desktop_style\",4, \"../css/site_style/desktop_style/desktop_style.css\", 1),
(\"header\",4, \"../css/site_style/desktop_style/header.css\", 1),
(\"menu\",4, \"../css/site_style/desktop_style/menu.css\", 1),
(\"main\",4, \"../css/site_style/desktop_style/main.css\", 1),
(\"footer\",4, \"../css/site_style/desktop_style/footer.css\", 1),
(\"home_css\",4, \"../css/site_style/desktop_style/component_style/home.css\", 1),
(\"about_us_css\",4, \"../css/site_style/desktop_style/component_style/about_us.css\", 1),
(\"contact_css\",4, \"../css/site_style/desktop_style/component_style/contact.css\", 1),
(\"catalog_css\",4, \"../css/site_style/desktop_style/component_style/catalog.css\", 1),
(\"faculty_css\",4, \"../css/site_style/desktop_style/component_style/faculty.css\", 1),
(\"login_form_css\",4, \"../css/site_style/desktop_style/component_style/login_form.php\", 1),
(\"register_form_css\",4, \"../css/site_style/desktop_style/component_style/register_form.css\", 1),
(\"db_conn\",2, \"site_struct/document_data/db_conn.php\", 1),
(\"document_data\",2, \"site_struct/data_struct/document_data/document_data.php\" , 1),
(\"header\",2, \"site_struct/data_struct/header.php\" , NULL),
(\"menu\",2, \"site_struct/data_struct/menu.php\" , NULL),
(\"main\",2, \"site_struct/data_struct/main.php\" , NULL),
(\"footer\",2, \"site_struct/data_struct/footer.php\" , NULL),
(\"home\",2,\"site_struct/data_struct/components/home.php\", 3),
(\"about_us\",2, \"site_struct/data_struct/components/about_us.php\", 3),
(\"contact\",2, \"site_struct/data_struct/components/contact.php\", 3),
(\"catalog\",2, \"site_struct/data_struct/components/catalog.php\", 3),
(\"reservation\",2, \"site_struct/data_struct/components/reservation.php\", 3),
(\"faculty\",2, \"site_struct/data_struct/components/faculty.php\", 3),
(\"registration\",2, \"site_struct/data_struct/components/registration.php\", 3),
(\"forgot_password\",2, \"site_struct/data_struct/components/forgot_password.php\", 3),
(\"reservation\",4, \"../css/site_style/desktop_style/component_style/reservation.css\", 1),
(\"res_cal\",4, \"../css/site_style/desktop_style/component_style/res_cal.css\", 1),
(\"drop_down_menu\",4, \"../css/site_style/desktop_style/component_style/drop_down_menu.php\", 1),
(\"init\",3, \"../js/init.js\", 1),
(\"absolute_menu\",3, \"../js/absolute_menu.js\", 1),
(\"google_maps\",3, \"../js/google_map.js\", 1),
(\"res_cal\",3, \"../js/res_cal.js\", 1),
(\"login_check\",3, \"../js/login_check.js\", 1)
;";
mysqli_query($conn , $sql)or die("ERROR 17" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."_component_data_image (component_data_image_path ,file_type_id) VALUES
(\"../images/img_bt_add.png\",6),
(\"../images/img_bt_sub.png\",6), 
(\"../images/img_bt_edit.png\",6);";
mysqli_query($conn, $sql) or die("ERROR 18" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."_component_data (component_data_title ,component_data_image_id, access_level_id) VALUES
(\"add_btn\",1,1),
(\"del_btn\",2,1), 
(\"edit_btn\",3,1);";
mysqli_query($conn, $sql) or die("ERROR 18" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."_page_component_structure (page_component_title , include_file_id , access_level_id,submenu_id,component_data_id) VALUES 
(\"header\",15,3,1,NULL) , 
(\"menu\",16,3,1,NULL) , 
(\"main\",17,3,1,NULL), 
(\"footer\",18,3,1,NULL),
(\"Home\",19,3,2,NULL), 
 (\"About us\",20,3,3,NULL),
 (\"Contact\",21,3,4,NULL),
 (\"Catalog\",22,3,5,NULL),
 (\"Reservation\",23,2,6,NULL),
 (\"Faculty\",24,3,7,NULL)
;";
mysqli_query($conn , $sql) or die("ERROR 18" . mysqli_error($conn));

 $sql = "INSERT INTO ".$prefix."_user(access_level_id , user_name , user_email  , user_password , user_gender) VALUES
 (1 , \"john\" , \"john@gmail.com\" , \"john123\" , \"male\"),
 (2 , \"marie\" , \"marie@gmail.com\" , \"marie123\" , \"female\"),
 (2 , \"vedel\" , \"vedel@gmail.com\" , \"vedel123\" , \"female\");";
 mysqli_query($conn, $sql) or die("ERROR 19" . mysqli_error($conn));
 
mysqli_close($conn) or die("ERROR 20" . mysqli_error($conn));

$sql = NULL;
$conn = NULL;
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "</head>";
echo "<body>";
echo "<h1 style = 'text-align:center; color:green;';>Installation succesfull</h1>";
echo "</body>";
echo "</html>";
?>