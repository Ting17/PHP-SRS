<?php
    include('dbconnect.php');
	if(isset($_POST['type']) && $_POST['type'] == "year"){
        if(isset($_POST['filterby']) && isset($_POST['value'])){
			$outp = "";
			$sql = "SELECT tbl_sales.* ,product.prod_name FROM tbl_sales join product on tbl_sales.prod_id = product.prod_id where DATE_FORMAT(".$_POST['filterby'].", '%Y')='".$_POST['value']."'";
			$result = $conn->query($sql);
            if($result->num_rows > 0){
                while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                    if ($outp != "") {
						$outp .= ",";
					}
					$outp .= '{"sales_id":"'  . $rs["id"] . '",';
					$outp .= '"prod_id":"'  . $rs["prod_id"] . '",';
					$outp .= '"prod_name":"'  . $rs["prod_name"] . '",';
					$outp .= '"sales_quantity":"'  . $rs["sales_quantity"] . '",';
					$outp .= '"sales_date":"'  . $rs["sales_date"] . '",';
					$outp .= '"member_id":"'  . $rs["member_id"] . '",';
					$outp .= '"sales_price":"'  . $rs["sales_price"] . '"}';
                }
                $outp ='['.$outp.']';
				echo $outp;
			}else{
				echo "NoData!".$sql;
			}
        }else{
			echo "Error!";
		}
    }
	$conn->close();
?>