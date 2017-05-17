<?php
/*
LEGENDS///////////////////////////////////////////////////////
1) Every custom component from foreign key start at the index of 2 and above ,
 1 is used for the base mechanics of the mini-platform
-quote "all else is a form of beauty"
 
2) A prefix is used under the variable $prefix , it is good to use a custom prefix when creating the DB for import and export purposes

3) DO NOT SET anything to a index of 0 , unfortunately the sql language is kinda buggy , using the data index 0 on a 
foreign key will result in a sql error , as of now there was no time to find a solution to the problem (even accessing the 
C files of the DB)

4) If you wish to hide elements from view from anyone set them to NULL , warning in future releases this method will be
deprecated and it's not recommended for use with the NULL property

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

//---------------------------------------------------------------------------------------------------------------
$server_name = "localhost";//the servers name where the php will connect to execute the sql databases
$server_user = "root";//username of the server administration
$server_password = "";//password of the server administrator
$prefix = "re2213";//a prefix for the database and tables of the database
$prefix .= "_";
$db_name = $prefix."restaurant_db";//the name of the database
$sql = NULL;//sql query


$conn = mysqli_connect($server_name , $server_user , $server_password ) or die("ERROR 00 " . mysqli_connect_error($conn));//simple connection to the server

$sql = "CREATE DATABASE " . $db_name . " CHARACTER SET utf8 COLLATE utf8_bin;";

mysqli_query($conn , $sql);

//if the database already exists in the sql then delete it and re-create it -> THIS FUTURE WILL HAVE AN OPTION IN THE FUTURE ASKING THE ADMIN IF HE WHICH TO REMOVE IT OR NOT
if(mysqli_error($conn))
{
	$sql = "DROP DATABASE " . $db_name;
    mysqli_query($conn, $sql) or die("ERROR 01" . mysqli_error($conn));
	$sql = "CREATE DATABASE " . $db_name . " CHARACTER SET utf8 COLLATE utf8_bin;";
    mysqli_query($conn, $sql) or die("ERROR 02" . mysqli_error($conn));
}

$sql = "use " . $db_name;
mysqli_query($conn, $sql) or die("ERROR 03" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."accessLv
(
	accessLv_id INT AUTO_INCREMENT,
	accessLv_title VARCHAR(15) NOT NULL DEFAULT \"ADMIN\",
	accessLv_date_created DATETIME NOT NULL DEFAULT NOW(),
	PRIMARY KEY(accessLv_id)
)ENGINE = innoDB;";//the access level is used to determine the level of clearance the user has over the components and data , the index of 1 by default is set to the higher security clearance  
mysqli_query($conn, $sql) or die("ERROR 04" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."fileType
(
	fileType_id INT AUTO_INCREMENT,
	fileType_title VARCHAR(50),
	fileType_extension VARCHAR(5),
	fileType_date_created DATETIME NOT NULL DEFAULT NOW(),
	PRIMARY KEY(fileType_id)
)ENGINE = innoDB;";//this table determines custom database data format label , this is used to determine the data type of the file used in code
mysqli_query($conn , $sql) or die("ERROR 05" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."user
(
	user_id INT AUTO_INCREMENT,
	user_name VARCHAR(24) NOT NULL UNIQUE,
	user_email VARCHAR(48) NOT NULL UNIQUE,
	user_password VARCHAR(48) NOT NULL UNIQUE,
	user_gender VARCHAR(1) NOT NULL,
	user_date_created DATETIME NOT NULL DEFAULT NOW(),
	user_blocked BOOLEAN NOT NULL DEFAULT FALSE,
	accessLv_id INT DEFAULT 3 NOT NULL,
	PRIMARY KEY(user_id),
	FOREIGN KEY (accessLv_id) REFERENCES ".$prefix."accessLv(accessLv_id)
) ENGINE = innoDB;";//this is the user table , using the access level we determine the components data the user has access to
mysqli_query($conn, $sql) or die("ERROR 06" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."userLogin
(
	userLogin_id INT AUTO_INCREMENT,
	userLogin_date DATETIME NOT NULL DEFAULT \"1000-10-10\",
	userLogin_date_out DATETIME NOT NULL DEFAULT \"1000-10-10\",
	userLogin_state BOOLEAN NOT NULL DEFAULT FALSE,
	user_id INT,
	PRIMARY KEY(userLogin_id),
	FOREIGN KEY (user_id) REFERENCES ".$prefix."user(user_id)
) ENGINE = innoDB;";
mysqli_query($conn, $sql) or die("ERROR 07" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."resPos
(
	resPos_id INT AUTO_INCREMENT NOT NULL,
	resPos_title VARCHAR(64),
	resPos_date_created DATETIME NOT NULL DEFAULT NOW(),
	resPos_desc VARCHAR(255),
	PRIMARY KEY(resPos_id)
) ENGINE = innoDB;";//restaurant positions for the diner tables
mysqli_query($conn,$sql) or die("ERROR 08".mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."Dtable
(
	Dtable_id INT AUTO_INCREMENT NOT NULL,
	Dtable_date_created DATETIME NOT NULL DEFAULT NOW(),
	Dtable_capacity INT(2) NOT NULL DEFAULT 1,
	resPos_id INT DEFAULT 1 NOT NULL,
	Dtable_blocked BOOLEAN NOT NULL Default 0, 
	PRIMARY KEY(Dtable_id),
	FOREIGN KEY (resPos_id) REFERENCES ".$prefix."resPos(resPos_id)
) ENGINE = innoDB;";//by default a table belongs to the administrator(owner) of the restaurant
mysqli_query($conn, $sql) or die("ERROR 09".mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."reservation
(
	reservation_id INT AUTO_INCREMENT,
	reservation_name VARCHAR(32) NOT NULL,
	reservation_smoker BOOLEAN NOT NULL DEFAULT FALSE,
	reservation_people INT(2) NOT NULL DEFAULT 1,
	reservation_date DATETIME NOT NULL DEFAULT \"1000-10-10\",
	reservation_comm VARCHAR(255) NOT NULL DEFAULT \"none\",
	user_id INT NOT NULL,
	PRIMARY KEY(reservation_id),
	FOREIGN KEY (user_id) REFERENCES ".$prefix."user(user_id)
) ENGINE = innoDB;";
mysqli_query($conn, $sql) or die("ERROR 10" . mysqli_error($conn));

$sql ="
CREATE TABLE ".$prefix."resDate
(
	resDate_id INT AUTO_INCREMENT,
	Dtable_id INT,
	reservation_id INT,
	PRIMARY KEY(resDate_id),
	FOREIGN KEY (Dtable_id) REFERENCES ".$prefix."Dtable(Dtable_id),
	FOREIGN key (reservation_id) REFERENCES ".$prefix."reservation(reservation_id)
) ENGINE = innoDB;";
mysqli_query($conn,$sql) or die ("ERROR 10.5" . mysqli_error($conn));

$sql = " 
CREATE TABLE ".$prefix."mStruct
(
    mStruct_id INT AUTO_INCREMENT NOT NULL,
    mStruct_date_created DATETIME NOT NULL DEFAULT NOW(),
    mStruct_title VARCHAR(32),
	accessLv_id INT DEFAULT 1 NOT NULL,
    PRIMARY KEY (mStruct_id),
	FOREIGN KEY (accessLv_id) REFERENCES ".$prefix."accessLv(accessLv_id)
) ENGINE = innoDB;";//by default the index 1 has been used as a default for the body contain of the site , all the rest indexes are set as custom , thus creating a menu only needs to set the index 2 and above (page_component_id,menu_id)
mysqli_query($conn, $sql) or die("ERROR 11" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."subMStruct
(
    subMStruct_id INT AUTO_INCREMENT NOT NULL,
    subMStruct_date_created DATETIME NOT NULL DEFAULT NOW(),
    subMStruct_title VARCHAR(32),
    mStruct_id INT DEFAULT 1 NOT NULL,
	accessLv_id INT DEFAULT 1 NOT NULL,
    PRIMARY KEY (subMStruct_id),
    FOREIGN KEY (mStruct_id) REFERENCES ".$prefix."mStruct(mStruct_id),
	FOREIGN KEY (accessLv_id) REFERENCES ".$prefix."accessLv(accessLv_id)
) ENGINE = innoDB;";//the sub menu is the buttons menu of the menu , the columns of the menu , again the same logic applies , the index 1 has been reserved for the platforms base data(menu_id)
mysqli_query($conn, $sql) or die("ERROR 12" . mysqli_error($conn));

$sql="
CREATE TABLE ".$prefix."compDataImg
(
	compDataImg_id INT AUTO_INCREMENT,
	compDataImg_title VARCHAR(32) NOT NULL,
	compDataImg_path VARCHAR(50) ,
	compDataImg_date_created DATETIME NOT NULL DEFAULT NOW(),
	fileType_id INT,
	PRIMARY KEY(compDataImg_id),
	FOREIGN KEY(fileType_id) REFERENCES ".$prefix."fileType(fileType_id)
) ENGINE = innoDB;";//this table contains the file path of the images , NOT the data itself , it only registers the path , using the file type table we can determine the file type of the folder(this is mostly compatible and useful to know the file type for convenience for when writing sql entry's )
mysqli_query($conn, $sql) or die("ERROR 13" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."compData
(
	compData_id INT AUTO_INCREMENT,
	compData_title VARCHAR(32) NOT NULL,
	compData_date_created DATETIME NOT NULL DEFAULT NOW(),
	compDataImg_id INT DEFAULT 1,
	accessLv_id INT DEFAULT 1,
	PRIMARY KEY(compData_id),
	FOREIGN KEY(compDataImg_id) REFERENCES ".$prefix."compDataImg(compDataImg_id),
	FOREIGN KEY(accessLv_id) REFERENCES ".$prefix."accessLv(accessLv_id)
) ENGINE = innoDB;";//component data is a table where it connects all extra data to the page component , you can create your own table and connect it to this table , then when you write the sql you can get access to your table
mysqli_query($conn, $sql) or die("ERROR 14" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."incFile
(
	incFile_id INT AUTO_INCREMENT,
	incFile_title VARCHAR(64),
	incFile_date_created DATETIME NOT NULL DEFAULT NOW(),
	incFile_path VARCHAR(255),
	fileType_id INT DEFAULT 1 NOT NULL,
	accessLV_id INT DEFAULT 1 NOT NULL,
	PRIMARY KEY(incFile_id),
	FOREIGN KEY (fileType_id) REFERENCES ".$prefix."fileType(fileType_id),
	FOREIGN KEY (accessLV_id) REFERENCES ".$prefix."accessLV(accessLV_id)
) ENGINE = innoDB;";//this table contains all the header files to be include during the entry of the application
mysqli_query($conn, $sql) or die("ERROR 15" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."PCompStruct
(
	PCompStruct_id INT AUTO_INCREMENT,
	PCompStruct_title VARCHAR(32),
	PCompStruct_date_created DATETIME NOT NULL DEFAULT NOW(),
	accessLv_id INT DEFAULT 1 NOT NULL,
	incFile_id INT,
	subMStruct_id INT DEFAULT 1,
	compData_id INT DEFAULT 1,
	PRIMARY KEY(PCompStruct_id),
	FOREIGN KEY (accessLv_id) REFERENCES ".$prefix."accessLv(accessLv_id),
	FOREIGN KEY (subMStruct_id) REFERENCES ".$prefix."subMStruct(subMStruct_id),
	FOREIGN KEY (compData_id) REFERENCES ".$prefix."compData(compData_id),
	FOREIGN KEY (incFile_id) REFERENCES ".$prefix."incFile(incFile_id)
) ENGINE = innoDB;";//the page component structure is the table where it determines the position and hierarchical structure of your application contain , from the body to the main contain
mysqli_query($conn, $sql) or die("ERROR 16" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."category
(
	category_id INT AUTO_INCREMENT,
	category_title VARCHAR(32) NOT NULL DEFAULT \"None\",
	PRIMARY KEY(category_id)
) ENGINE = innoDB;";

mysqli_query($conn, $sql) or die ("ERROR 17" . mysqli_error($conn));

$sql = "
CREATE TABLE ".$prefix."product
(
	product_id INT AUTO_INCREMENT,
	product_title VARCHAR(64),
	product_price FLOAT(5,2) NOT NULL DEFAULT 1.00,
	product_desc VARCHAR(255),
	category_id INT,
	PRIMARY KEY(product_id),
	FOREIGN KEY (category_id) REFERENCES ".$prefix."category(category_id)
) ENGINE = innoDB;";

mysqli_query($conn,$sql) or die ("ERROR 18" . mysqli_error($conn));


/*
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

below is the default inserted data , all of it can be changed after the installation 
*/
$sql = "INSERT INTO ".$prefix."accessLv (accessLv_title) VALUES 
(\"ADMIN\") , 
(\"PUBLIC\") , 
(\"GUEST\");";
mysqli_query($conn, $sql) or die("ERROR 17" . mysqli_error($conn));

$sql = "
INSERT INTO ".$prefix."fileType(fileType_title , fileType_extension) VALUES 
(\"hyper text mark up language\" , \"html\"),
(\"hypertext preprocessor\" , \"php\"),
(\"JavaScript\" , \"js\"),
(\"cascading style sheet\" , \"css\"),
(\"Joint Photographic Expert Group\" , \"jpeg\"),
(\"Portable Network Graphics\" , \"png\");";
mysqli_query($conn , $sql)or die("ERROR 18" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."mStruct (mStruct_title ,accessLv_id) VALUES
(\"menu0\",3),
(\"Information\",3), 
(\"Reservation\",3),
(\"List's and editing\",1),
(\"menu4\",2);";
mysqli_query($conn, $sql) or die("ERROR 19" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."subMStruct(subMStruct_title,mStruct_id , accessLv_id) VALUES
(\"Body\",1,3),
(\"Home\",2,3) , 
(\"About us\",2,3) , 
(\"Contact\",2,3) , 
(\"Catalogue\",3,3) , 
(\"Submit Reservation\",3,2) , 
(\"Faculty\",2,3),
(\"Users List\",4,1),
(\"Tables List\",4,1),
(\"Reservation list\",4,1),
(\"Test4\",5,2),
(\"Test5\",5,2);";
mysqli_query($conn, $sql) or die("ERROR 20" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."incFile (incFile_title, fileType_id , incFile_path,accessLV_id) VALUES 
(\"desktop_style\",4, \"../css/site_style/desktop_style/desktop_style.css\",3),
(\"header\",4, \"../css/site_style/desktop_style/header.css\",3),
(\"menu\",4, \"../css/site_style/desktop_style/menu.css\",3),
(\"main\",4, \"../css/site_style/desktop_style/main.css\",3),
(\"footer\",4, \"../css/site_style/desktop_style/footer.css\",3),
(\"home_css\",4, \"../css/site_style/desktop_style/component_style/home.css\",3),
(\"about_us_css\",4, \"../css/site_style/desktop_style/component_style/about_us.css\",3),
(\"contact_css\",4, \"../css/site_style/desktop_style/component_style/contact.css\",3),
(\"catalog_css\",4, \"../css/site_style/desktop_style/component_style/catalog.css\",3),
(\"faculty_css\",4, \"../css/site_style/desktop_style/component_style/faculty.css\",3),
(\"login_form_css\",4, \"../css/site_style/desktop_style/component_style/login_form.php\",3),
(\"register_form_css\",4, \"../css/site_style/desktop_style/component_style/register_form.css\",3),
(\"db_conn\",2, \"site_struct/document_data/db_conn.php\",3),
(\"document_data\",2, \"site_struct/data_struct/document_data/document_data.php\",3),
(\"header\",2, \"site_struct/data_struct/header.php\",3),
(\"menu\",2, \"site_struct/data_struct/menu.php\",3),
(\"main\",2, \"site_struct/data_struct/main.php\",3),
(\"footer\",2, \"site_struct/data_struct/footer.php\",3),
(\"home\",2,\"site_struct/data_struct/components/home.php\",3),
(\"about_us\",2, \"site_struct/data_struct/components/about_us.php\",3),
(\"contact\",2, \"site_struct/data_struct/components/contact.php\",3),
(\"catalogue\",2, \"site_struct/data_struct/components/catalog.php\",3),
(\"reservation\",2, \"site_struct/data_struct/components/reservation.php\",2),
(\"faculty\",2, \"site_struct/data_struct/components/faculty.php\",3),
(\"registration\",2, \"site_struct/data_struct/components/registration.php\",3),
(\"forgot_password\",2, \"site_struct/data_struct/components/forgot_password.php\",3),
(\"reservation\",4, \"../css/site_style/desktop_style/component_style/reservation.css\",2),
(\"res_cal\",4, \"../css/site_style/desktop_style/component_style/res_cal.css\",2),
(\"drop_down_menu\",4, \"../css/site_style/desktop_style/component_style/drop_down_menu.css\",3),
(\"user_editor_css\",4, \"../css/site_style/desktop_style/component_style/user_editor.css\",1),
(\"init\",3, \"../js/init.js\",3),
(\"absolute_menu\",3, \"../js/absolute_menu.js\",3),
(\"inputCheck\",3, \"../js/inputCheck.js\",3),
(\"res_cal\",3, \"../js/res_cal.js\",2),
(\"login_check\",3, \"../js/login_check.js\",3),
(\"users_list\",2,\"site_struct/data_struct/components/user_list.php\",1),
(\"users_list_css\",4, \"../css/site_style/desktop_style/component_style/users_list.css\",1),
(\"tables_list\",2,\"site_struct/data_struct/components/tables_list.php\",1),
(\"tables_list_css\",4, \"../css/site_style/desktop_style/component_style/tables_list.css\",1),
(\"reservations\",2,\"site_struct/data_struct/components/reservations.php\",1),
(\"reservations_css\",4, \"../css/site_style/desktop_style/component_style/reservations.css\",1),
(\"user_editor\",2,\"site_struct/data_struct/components/additional_componets/php/user_editor.php\",1),
(\"user_editor_js\",3, \"../js/user_editor.js\",1),
(\"table_editor_css\",4, \"../css/site_style/desktop_style/component_style/table_editor.css\",1),
(\"table_editor\",2,\"site_struct/data_struct/components/additional_componets/php/table_editor.php\",1),
(\"table_editor_js\",3, \"../js/table_editor.js\",1),
(\"room_editor_css\",4, \"../css/site_style/desktop_style/component_style/room_editor.css\",1),
(\"room_editor\",2,\"site_struct/data_struct/components/additional_componets/php/room_editor.php\",1),
(\"room_editor_js\",3, \"../js/room_editor.js\",1);";
mysqli_query($conn , $sql)or die("ERROR 21" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."compDataImg (compDataImg_title,compDataImg_path ,fileType_id) VALUES
(\"add_btn\",\"../images/img_bt_add.png\",6),
(\"del_btn\",\"../images/img_bt_lock.png\",6), 
(\"edit_btn\",\"../images/img_bt_edit.png\",6);";
mysqli_query($conn, $sql) or die("ERROR 22" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."compData (compData_title ,compDataImg_id, accessLv_id) VALUES
(\"add_btn\",1,1),
(\"del_btn\",2,1), 
(\"edit_btn\",3,1);";
mysqli_query($conn, $sql) or die("ERROR 23" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."PCompStruct (PCompStruct_title , incFile_id , accessLv_id,subMStruct_id,compData_id) 
VALUES 
(\"header\",15,3,1,NULL) , 
(\"menu\",16,3,1,NULL) , 
(\"main\",17,3,1,NULL), 
(\"footer\",18,3,1,NULL),
(\"Home\",19,3,2,NULL), 
(\"About us\",20,3,3,NULL),
(\"Contact\",21,3,4,NULL),
(\"Catalogue\",22,3,5,NULL),
(\"Reservation\",23,2,6,NULL),
(\"Faculty\",24,3,7,NULL),
(\"Users List\",36,1,8,NULL),
(\"Tables List\",38,1,9,NULL),
(\"Reservations\",40,1,10,NULL);";
mysqli_query($conn , $sql) or die("ERROR 24" . mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."user(accessLv_id , user_name , user_email  , user_password , user_gender) VALUES
(1 , \"master\" , \"hostMaster@gmail.com\" , \"".crypt("master123","T51")."\" , \"M\"),
(2 , \"marie\" , \"marie@gmail.com\" , \"".crypt("marie123","T51")."\" , \"F\"),
(2 , \"vedel\" , \"vedel@gmail.com\" , \"".crypt("vedel123","T51")."\" , \"F\");";
mysqli_query($conn, $sql) or die("ERROR 25" . mysqli_error($conn));
 
$sql = "INSERT INTO ".$prefix."resPos(resPos_title,resPos_desc) VALUES
(\"second floor\",\"the second floor has a beautiful view of the city , you can enjoy the view while eating and relaxing.\"),
(\"backyard\",\"enjoy the beautiful jungle theme backyard and enjoy our tropical juices from different tropical rainforest's fruit'\"),
(\"main floor\",\"enjoy our in display cooking with our best chef cooking in front of you while you eat.\");";
mysqli_query($conn,$sql) or die("ERROR 26". mysqli_error($conn));

$sql ="INSERT INTO ".$prefix."Dtable(Dtable_capacity,resPos_id) VALUES
(5,1),
(2,1),
(10,1),
(6,2),
(3,2),
(7,2),
(5,3),
(3,3),
(4,3);";
mysqli_query($conn , $sql) or die("ERROR 27". mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."category (category_title) VALUES 
(\"Main Dishes\"),
(\"Deserts\");";
mysqli_query($conn , $sql) or die("ERROR 28". mysqli_error($conn));

$sql = "INSERT INTO ".$prefix."product (product_title, product_desc, product_price, category_id) VALUES 
(\"La mere rouge\", \"A delicacy brough from france with love\",14.99, 1),
(\"Buffet Noire\", \"A buffet with a lot kinds of meat\", 24.99, 1),
(\"Cream a Vannile\",\"Desert made by the chef himself with a lot of cream and fruit on top of it\" ,13.99, 2),
(\"La Croix\",\"A dishe for the believers of god\" ,54.99, 2);";
 mysqli_query($conn , $sql) or die("ERROR 29". mysqli_error($conn));
 
mysqli_close($conn) or die("ERROR 30" . mysqli_error($conn));

$sql = NULL;//clear data sql for garbage collection purposes as well security reasons (for remote installation mostly)
$conn = NULL;//same with the above

//message for if the installation was successfully, if not the installation will be stopped by a sql error and it will show you the error that accured
//IF an error has accured please send it to the appropriate author of this platform for bug fix
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "</head>";
echo "<body>";
echo "<h1 style = 'text-align:center; color:green;';>Installation successful</h1>";
echo "</body>";
echo "</html>";
?>