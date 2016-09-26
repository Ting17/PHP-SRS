<?php
    include('dbconnect.php'); 
    if(isset($_POST['prod_name']) || isset($_POST['prod_desc']) || isset($_POST['prod_price']) || isset($_POST['Manufacture']) || isset($_POST['Category']) || isset($_POST['Manu_date']) || isset($_POST['Expiry_date'])) 
    {
        $prod_name = $_POST['prod_name'];
        $prod_desc = $_POST['prod_desc']; 
        $prod_price = $_POST['prod_price']; 
        $Manufacture = $_POST['Manufacture'];
        $Category = $_POST['Category'];
        $Manu_date = $_POST['Manu_date'];
        $Expiry_date = $_POST['Expiry_date'];
        
        $sql = "INSERT INTO product(prod_name, prod_desc, prod_price, Manufacture, Category, Manu_date, Expiry_date) VALUES('". $prod_name ."','". $prod_desc ."','". $prod_price ."','". $Manufacture ."','". $Category ."','". $Manu_date ."','". $Expiry_date ."');";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
    }
	$conn->close();
?>

