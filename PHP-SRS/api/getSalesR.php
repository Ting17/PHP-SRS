<?php
    include('dbconnect.php');
    $num = 0;
    $result = $conn->query("SELECT * FROM tbl_sales;");
	$outp = "";

/* Testing Part */
    $testing = $conn->query("SELECT * FROM tbl_sales;");

    while($rs = $testing->fetch_array(MYSQLI_ASSOC)) {
        $retrieve_testing = "SELECT prod_name FROM product WHERE prod_id ='".$rs["prod_id"]."'";
        $testing2 = $conn->query($retrieve_testing);
        if ($testing2->num_rows > 0) 
        {
            // output data of each row
            while($row = $testing2->fetch_assoc()) 
            {
                $num = $num + 1;
            }
        }
    }
/* /Testing Part */

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

		$retrieve_prodName = "SELECT prod_name FROM product WHERE prod_id ='".$rs["prod_id"]."'";
        $result2 = $conn->query($retrieve_prodName);

        if ($result2->num_rows > 0) 
        {
            // output data of each row
            while($row = $result2->fetch_assoc()) 
            {
                $prod_name = $row["prod_name"];
            }
        }

		if ($outp != "") 
        {
            $outp .= ",";
        }
        
        $rs["sales_date"] = explode(" ",$rs["sales_date"]);
        $rs["sales_date"] = explode("-",$rs["sales_date"][0]);
        
        $rs["sales_date"] = $rs["sales_date"][0]."/".$rs["sales_date"][1]."/".$rs["sales_date"][2];  
        
        $outp .= '{"sales_id":"'  . $rs["id"] . '",';
		$outp .= '"prod_id":"'  . $rs["prod_id"] . '",';
		$outp .= '"prod_name":"'  . $prod_name . '",';
		$outp .= '"sales_quantity":"'  . $rs["sales_quantity"] . '",';
		$outp .= '"sales_date":"'  . $rs["sales_date"] . '",';
		$outp .= '"member_id":"'  . $rs["member_id"] . '",';
        $outp .= '"sales_price":"'  . $rs["sales_price"] . '",';
        $outp .= '"num_rows":"'  . $num . '"}';
	}

	$outp ='['.$outp.']';
	$conn->close();

	echo($outp);
?>