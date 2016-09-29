<?php
    include('dbconnect.php');
    $sql = '';
    
    //This line translating all params from js file to a variable named $put_vars
    parse_str(file_get_contents("php://input"),$put_vars);
 
        $sales_id = $put_vars['sales_id'];
        $prod_name = $put_vars['prod_name'];
              
        if($put_vars['prod_name'] !== '')
        {
            $retrieve_prod_id = "SELECT prod_id FROM product WHERE prod_name ='".$prod_name."'";
            $result = $conn->query($retrieve_prod_id);

            if ($result->num_rows > 0) 
            {
                // output data of each row
                while($row = $result->fetch_assoc()) 
                {
                    $prod_id = $row['prod_id'];
                }
            }

            $retrieve_prod_price = "SELECT prod_price FROM product WHERE prod_id ='".$prod_id."'";
            $result2 = $conn->query($retrieve_prod_price);

            if ($result2->num_rows > 0) 
            {
                // output data of each row
                while($row2 = $result2->fetch_assoc()) 
                {
                    $prod_price = $row2['prod_price'];
                }
            }

            $retrieve_sales_quantity = "SELECT sales_quantity FROM tbl_sales WHERE id ='".$sales_id."'";
            $result3 = $conn->query($retrieve_sales_quantity);

            if ($result3->num_rows > 0) 
            {
                // output data of each row
                while($row2 = $result3->fetch_assoc()) 
                {
                    $sales_quantity = $row2['sales_quantity'];
                }
            }

            $overall_price = $sales_quantity * $prod_price;

            $sql = "UPDATE tbl_sales SET prod_id = '" . $prod_id . "', sales_price = '".$overall_price."' WHERE id = '". $sales_id ."';";
        }
        
        if($put_vars['member_id'] !== '')
        {
            $member_id = $put_vars['member_id'];
            $sql = "UPDATE tbl_sales SET member_id = '" . $member_id . "' WHERE id = '". $sales_id ."';";
        }

        if($put_vars['sales_quantity'] !== '')
        {
            $retrieve_prod_id = "SELECT prod_id FROM tbl_sales WHERE id ='".$sales_id."'";
            $result = $conn->query($retrieve_prod_id);

            if ($result->num_rows > 0) 
            {
                // output data of each row
                while($row = $result->fetch_assoc()) 
                {

                    $prod_id = $row['prod_id'];
                }
            }

            $retrieve_prod_price = "SELECT prod_price FROM product WHERE prod_id ='".$prod_id."'";
            $result2 = $conn->query($retrieve_prod_price);

            if ($result2->num_rows > 0) 
            {
                // output data of each row
                while($row2 = $result2->fetch_assoc()) 
                {

                    $prod_price = $row2['prod_price'];
                }
            }

            $sales_quantity = $put_vars['sales_quantity'];
            $overall_price = $sales_quantity * $prod_price;
            
            $sql = "UPDATE tbl_sales SET sales_quantity = '" . $sales_quantity . "', sales_price = '".$overall_price."' WHERE id = '". $sales_id ."';";

        }

        if($put_vars['prod_name'] !== '' && $put_vars['sales_quantity'] !== '')
        {
            $retrieve_prod_id = "SELECT prod_id FROM product WHERE prod_name ='".$prod_name."'";
            $result = $conn->query($retrieve_prod_id);

            if ($result->num_rows > 0) 
            {
                // output data of each row
                while($row = $result->fetch_assoc()) 
                {
                    $prod_id = $row['prod_id'];
                }
            }

            $retrieve_prod_price = "SELECT prod_price FROM product WHERE prod_id ='".$prod_id."'";
            $result2 = $conn->query($retrieve_prod_price);

            if ($result2->num_rows > 0) 
            {
                // output data of each row
                while($row2 = $result2->fetch_assoc()) 
                {
                    $prod_price = $row2['prod_price'];
                }
            }

            $overall_price = $prod_price * $put_vars['sales_quantity'];    

            $sql = "UPDATE tbl_sales SET prod_id = '" . $prod_id . "', sales_quantity = '" . $sales_quantity . "', sales_price = '".$overall_price."' WHERE id = '". $sales_id ."';";
        }
        
        if($put_vars['prod_name'] !== '' && $put_vars['member_id'] !== ''&& $put_vars['sales_quantity'] !== '')
        {
            $retrieve_prod_id = "SELECT prod_id FROM product WHERE prod_name ='".$prod_name."'";
            $result = $conn->query($retrieve_prod_id);

            if ($result->num_rows > 0) 
            {
                // output data of each row
                while($row = $result->fetch_assoc()) 
                {
                    $prod_id = $row['prod_id'];
                }
            }

            $retrieve_prod_price = "SELECT prod_price FROM product WHERE prod_id ='".$prod_id."'";
            $result2 = $conn->query($retrieve_prod_price);

            if ($result2->num_rows > 0) 
            {
                // output data of each row
                while($row2 = $result2->fetch_assoc()) 
                {
                    $prod_price = $row2['prod_price'];
                }
            }

            $overall_price = $prod_price * $put_vars['sales_quantity']; 

            $sql = "UPDATE tbl_sales SET prod_id = '" . $prod_id . "', member_id = '" . $put_vars['member_id'] . "', sales_quantity = '" . $put_vars['sales_quantity'] . "', sales_price ='".$overall_price."' WHERE id = '". $sales_id ."';";

            echo $sql;
        }

    //Respond Message
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	$conn->close();
?>
