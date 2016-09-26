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
        $outp .= '"purchase_price":"'  . $rs["purchase_price"] . '"}';
	}
	$outp ='['.$outp.']';
	$conn->close();

	echo($outp);
?>