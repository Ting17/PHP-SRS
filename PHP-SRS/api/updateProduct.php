<?php
    include('dbconnect.php');
    $sql = '';
  
    //This line translating all params from js file to a variable named $put_vars
    parse_str(file_get_contents("php://input"),$put_vars);
 
    $prod_id = $put_vars['prod_id'];
              
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
        
        if($put_vars['prod_price'] !== '')
        {
            $prod_price = $put_vars['prod_price'];
            $sql = "UPDATE product SET prod_price = '" . $prod_price . "' WHERE prod_id = '". $prod_id ."';";
        }

        if($put_vars['Manufacture'] !== '')
        {
            $Manufacture = $put_vars['Manufacture'];
            $sql = "UPDATE product SET Manufacture = '" . $Manufacture . "' WHERE prod_id = '". $prod_id ."';";
        }

        if($put_vars['Category'] !== '')
        {
            $Category = $put_vars['Category'];
            $sql = "UPDATE product SET Category = '" . $Category . "' WHERE prod_id = '". $prod_id ."';";
        }

        if($put_vars['Manu_date'] !== '')
        {
            $Manu_date = $put_vars['Manu_date'];
            $sql = "UPDATE product SET Manu_date = '" . $Manu_date . "' WHERE prod_id = '". $prod_id ."';";
        }

        if($put_vars['Expiry_date'] !== '')
        {
            $Expiry_date = $put_vars['Expiry_date'];
            $sql = "UPDATE product SET Expiry_date = '" . $Expiry_date . "' WHERE prod_id = '". $prod_id ."';";
        }
        
        if($put_vars['prod_name'] !== '' && $put_vars['prod_desc'] !== ''&& $put_vars['prod_price'] !== ''&& $put_vars['Manufacture'] !== ''&& $put_vars['Category'] !== ''&& $put_vars['Manu_date'] !== ''&& $put_vars['Expiry_date'] !== '')
        {
            $sql = "UPDATE product SET prod_name = '" . $prod_name . "', prod_desc = '" . $prod_desc . "', prod_price = '" . $prod_price . "', Manufacture = '" . $Manufacture . "', Category = '" . $Category . "', Manu_date = '" . $Manu_date . "', Expiry_date = '" . $Expiry_date . "' WHERE prod_id = '". $prod_id ."';";
        }
    

    //Respond Message
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	$conn->close();
?>

       
      