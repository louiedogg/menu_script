<?php
/*
* Copyright 2014 Restaurateur LLC
* admin@louiedgg.com
*  
*  http://restaurateurinc.com
*/

// create tables array
 $CT_array = array();

//

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


// Recipes
$CT_array['CT_recipe']="create table recipe (recipe_seq INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY , 
						recipe_dateTime DATETIME NOT NULL, 
						recipe_name VARCHAR(50),
						recipe_description VARCHAR(255),
						recipe_cost FLOAT(15,2));";

// Menu Items

$CT_array['CT_menuItem']="create table menuItem (menuItem_seq INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY , 
						menuItem_dateTime DATETIME NOT NULL, 
						menuItem_name VARCHAR(50),
						menuItem_price FLOAT(15,2),
						menuItem_cost FLOAT(15,2),
						menuItem_description VARCHAR(255),
						subCategory_seq INT,
						plate_seq INT);";
						
						
// Plate (Links Recipes and Menu Items)
$CT_array['CT_plate']="create table plate (plate_seq INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY , 
						plate_dateTime DATETIME NOT NULL,
						recipe_seq INT,
						menuItem_seq INT);";
						
						
						
// Vendors

$CT_array['CT_vendors']="create table vendors (vendors_seq INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY , 
						vendors_dateTime DATETIME NOT NULL, 
						vendors_name VARCHAR(50),
						vendors_phoneNum1 VARCHAR(20), 
						vendors_email VARCHAR(50),
						vendors_address1 VARCHAR(50), 
						vendors_address2 VARCHAR(50),   
						vendors_city VARCHAR(50), 
						vendors_state VARCHAR(50), 
						vendors_zipCode VARCHAR(50), 
						vendors_country VARCHAR(50), 
						vendors_contact VARCHAR(50),
						vendors_description VARCHAR(255));";
						
// Recipe Items

$CT_array['CT_recipeItem']="create table recipeItem (recipeItem_seq INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY , 
						recipeItem_dateTime DATETIME NOT NULL,
						groceryList_seq INT,
						recipe_seq INT,
						recipeItem_qty INT);";
						
// Grocery List 

$CT_array['CT_groceryList']="create table groceryList (groceryList_seq INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY , 
						groceryList_dateTime DATETIME NOT NULL, 
						groceryList_name VARCHAR(50),
						groceryList_description VARCHAR(255),
						invoiceItems_seq INT,
						uom_seq INT);";
						
// Unit of Measurement 

$CT_array['CT_uom']="create table uom (uom_seq INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY , 
						uom_dateTime DATETIME NOT NULL, 
						uom_name VARCHAR(50),
						uom_description VARCHAR(255));";
						
						
// Invoice 

$CT_array['CT_invoice']="create table invoice (invoice_seq INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
						invoice_dateTime DATETIME NOT NULL,
						invoice_date VARCHAR(25), 
						vendors_seq INT,
						category_seq INT,
						invoice_subtotal FLOAT(10,2),
						invoice_tax FLOAT(10,2),
						invoice_total FLOAT(10,2),
						invoice_closed INT);";	
						
// Category  ( Food, Liquor, Beer, Wine, Operating Expense etc )

$CT_array['CT_category']="create table category (category_seq INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY , 
						category_dateTime DATETIME NOT NULL, 
						category_name VARCHAR(50),
						category_description VARCHAR(255));";		
						
// Sub Category  ( Food, Liquor, Beer, Wine, Operating Expense etc )

$CT_array['CT_subCategory']="create table subCategory (subCategory_seq INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY , 
						subCategory_dateTime DATETIME NOT NULL,
						category_seq INT, 
						subCategory_name VARCHAR(50),
						subCategory_description VARCHAR(255));";						
						

// Invoice Items Import Temp

$CT_array['CT_iiTemp']="create table iiTemp (iiTemp_seq INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY , 
						iiTemp_dateTime DATETIME NOT NULL, 
						iiTemp_qty INT,
						iiTemp_description VARCHAR(255),
						iiTemp_unitcost FLOAT(15,2),
						iiTemp_totalcost FLOAT(15,2),
						groceryList_seq INT,
						invoice_seq INT);";


						
// Invoice Items  

$CT_array['CT_invoiceItems']="create table invoiceItems (invoiceItems_seq INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY , 
						invoiceItems_dateTime DATETIME NOT NULL, 
						invoiceItems_qty INT,
						invoiceItems_decription VARCHAR(255),
						invoiceItems_unitcost FLOAT(10,2),
						invoiceItems_totalcost FLOAT(10,2),
						groceryList_seq INT,
						invoice_seq INT);";
						
						
						
				



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// 





 

?>


