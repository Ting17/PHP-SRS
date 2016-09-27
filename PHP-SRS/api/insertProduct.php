<?php
    include('dbconnect.php'); 
    if(isset($_POST['prod_name']) || isset($_POST['prod_desc']) || isset($_POST['purchase_price'])) 
    {
        $prod_name = $_POST['prod_name'];
        $prod_desc = $_POST['prod_desc']; 
        $purchase_price = $_POST['purchase_price'];  
        
        $sql = "INSERT INTO product(prod_name, prod_desc, purchase_price) VALUES('". $prod_name ."','". $prod_desc ."','". $purchase_price ."');";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
    }
	$conn->close();
?>


