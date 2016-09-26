<?php
    include('dbconnect.php');
    $result = $conn->query("SELECT * FROM product;");
	$outp = "";

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($outp != "") 
        {
            $outp .= ",";
        }
        
		$outp .= '{"prod_id":"'  . $rs["prod_id"] . '",';
        $outp .= '"prod_name":"'  . $rs["prod_name"] . '",';
        $outp .= '"prod_desc":"'  . $rs["prod_desc"] . '",';
        $outp .= '"prod_price":"'  . $rs["prod_price"] . '",';
        $outp .= '"Manufacture":"'  . $rs["Manufacture"] . '",';
        $outp .= '"Category":"'  . $rs["Category"] . '",';
        $outp .= '"Manu_date":"'  . $rs["Manu_date"] . '",';
        $outp .= '"Expiry_date":"'  . $rs["Expiry_date"] . '"}';
	}
	$outp ='['.$outp.']';
	$conn->close();

	echo($outp);
?>
