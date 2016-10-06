<?php
    include('dbconnect.php');
    $result = $conn->query("SELECT * FROM tbl_sales;");
	$outp = "";

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {


		$retrieve_prodName = "SELECT prod_name FROM product WHERE prod_id ='".$rs["prod_id"]."'";
        $result2 = $conn->query($retrieve_prodName);

        if ($result2->num_rows > 0) 
        {
            // output data of each row
            while($row = $result2->fetch_assoc()) 
            {
                $prod_name = $row["prod_name"];
                //$outp .= '"prod_name":"'  . $prod_name . '"}';
            }
        }


		if ($outp != "") 
        {
            $outp .= ",";
        }
        
        $outp .= '{"sales_id":"'  . $rs["id"] . '",';
		$outp .= '"prod_id":"'  . $rs["prod_id"] . '",';
		$outp .= '"prod_name":"'  . $prod_name . '",';
		$outp .= '"sales_quantity":"'  . $rs["sales_quantity"] . '",';
		$outp .= '"sales_date":"'  . $rs["sales_date"] . '",';
		$outp .= '"member_id":"'  . $rs["member_id"] . '",';
        $outp .= '"sales_price":"'  . $rs["sales_price"] . '"}';
	}

	$outp ='['.$outp.']';
	$conn->close();

	echo($outp);
?>