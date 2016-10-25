<?php
    include('dbconnect.php'); 
    if(isset($_POST['prod_name']) || isset($_POST['prod_desc']) || isset($_POST['prod_price']) || isset($_POST['Manufacture']) || isset($_POST['Category']) || isset($_POST['Manu_date']) || isset($_POST['Expiry_date'])) 
    {
        $prod_name = $_POST['prod_name'];
        $prod_desc = $_POST['prod_desc']; 
        $prod_price = $_POST['prod_price']; 
        $Manufacture = $_POST['Manufacture'];
        $Category = $_POST['Category'];

        $Month_Array = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
        $Month_Number = array("01","02","03","04","05","06","07","08","09","10","11","12");

        $Expiry_date = $_POST['Expiry_date'];
        $Expiry_date = explode(" ",$Expiry_date);

        for($i=0;$i<12;$i++)
        {
            if($Expiry_date[1] == $Month_Array[$i])
            {
                $Expiry_date[1] = $Month_Number[$i];
            }
        }

        $Expiry_date = $Expiry_date[3]."-".$Expiry_date[1]."-".$Expiry_date[2];

        /***********************************************************************/
        
        $Manu_date = $_POST['Manu_date'];
        $Manu_date = explode(" ",$Manu_date);

        for($i=0;$i<12;$i++)
        {
            if($Manu_date[1] == $Month_Array[$i])
            {
                $Manu_date[1] = $Month_Number[$i];
            }
        }

        $Manu_date = $Manu_date[3]."-".$Manu_date[1]."-".$Manu_date[2];


        //$Manu_date = $_POST['Manu_date'];
        //$Expiry_date = $_POST['Expiry_date'];
        
        $sql = "INSERT INTO product(prod_name, prod_desc, prod_price, Manufacture, Category, Manu_date, Expiry_date) VALUES('". $prod_name ."','". $prod_desc ."','". $prod_price ."','". $Manufacture ."','". $Category ."','". $Manu_date ."','". $Expiry_date ."');";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
    }
	$conn->close();
?>

