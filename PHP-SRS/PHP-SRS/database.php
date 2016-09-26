<?php

	$localhost = "localhost";
	$username = "username";
	$password = "password";	

	$conn = mysql_connect($localhost,$username,$password)
				or die("Could not connect to mysql");

	mysql_query("CREATE DATABASE IF NOT EXISTS PHP_SRS")
		or die("Could not create the database PHP_SRS");

	mysql_select_db("PHP_SRS",$conn) 
		or die("Could not select database PHP_SRS");	


	$sales_query = "CREATE TABLE tbl_sales (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		prod_id INT,
		sales_quantity INT,
		sales_date DATETIME,
		member_id CHAR(13),
		sales_price DOUBLE,
		status CHAR(1)
	)";

	mysql_query($sales_query);


?>