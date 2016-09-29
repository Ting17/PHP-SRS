<?php
    include('dbconnect.php'); 

        $retrieve_prodID = "SELECT prod_id FROM product WHERE prod_name ='".$_POST['prod_name']."'";
        $result = $conn->query($retrieve_prodID);

        if ($result->num_rows > 0) 
        {
            // output data of each row
            while($row = $result->fetch_assoc()) 
            {
                $prod_id = $row['prod_id'];
            }
        }
    

        $retrieve_product_price = "SELECT prod_price FROM product WHERE prod_id='".$prod_id."'";
        $result2 = $conn->query($retrieve_product_price);

        if ($result2->num_rows > 0) 
        {
            // output data of each row
            while($row2 = $result2->fetch_assoc()) 
            {
                $prod_price = $row2['prod_price'];
            }
        }


        $sales_quantity = $_POST['sales_quantity'];
        $sales_date = date("Y-m-d h:i:sa");
        if($_POST['member_id'] != "")
        {
            $member_id = $_POST['member_id']; 
        }
        else
        {
            $member_id = "none";
        }
        $sales_price = $prod_price * $sales_quantity;  
        $status = 'A';
        
        $sql = "INSERT INTO tbl_sales(prod_id, sales_quantity, sales_date, member_id, sales_price, status) VALUES('". $prod_id ."','". $sales_quantity ."', '".$sales_date."' ,'".$member_id."', '".$sales_price."', '".$status."');";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

	$conn->close();
?>


