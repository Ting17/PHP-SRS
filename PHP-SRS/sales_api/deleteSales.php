
<?php
    include('dbconnect.php');
    $sql = '';
    
    $sales_id = $_POST['sales_id'];
    $sql = "DELETE FROM tbl_sales WHERE id = '". $sales_id ."';";

    //Respond Message
    if ($conn->query($sql) === TRUE) {
        echo "Record successfully deleted";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	$conn->close();
?>



