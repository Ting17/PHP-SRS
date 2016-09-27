<?php
    include('dbconnect.php');
    $sql = '';
    
    //This line translating all params from js file to a variable named $put_vars
    parse_str(file_get_contents("php://input"),$put_vars);
 
        $prod_id = $_GET['prod_id'];
              
        if($put_vars['prod_name'] !== '')
        {
            $prod_name = $put_vars['prod_name'];
            $sql = "UPDATE product SET prod_name = '" . $prod_name . "' WHERE prod_id = '". $prod_id ."';";
        }
        
        if($put_vars['prod_desc'] !== '')
        {
            $prod_desc = $put_vars['prod_desc'];
            $sql = "UPDATE product SET prod_desc = '" . $prod_desc . "' WHERE prod_id = '". $prod_id ."';";
        }
        
        if($put_vars['purchase_price'] !== '')
        {
            $purchase_price = $put_vars['purchase_price'];
            $sql = "UPDATE product SET purchase_price = '" . $purchase_price . "' WHERE prod_id = '". $prod_id ."';";
        }
        
        if($put_vars['prod_name'] !== '' && $put_vars['prod_desc'] !== ''&& $put_vars['purchase_price'] !== '')
        {
            $sql = "UPDATE product SET prod_name = '" . $prod_name . "', prod_desc = '" . $prod_desc . "', purchase_price = '" . $purchase_price . "' WHERE prod_id = '". $prod_id ."';";
        }

    //Respond Message
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	$conn->close();
?>
