
<?php
    include('dbconnect.php');
    $sql = '';
    
$prod_id = $_POST['prod_id'];
      $sql = "DELETE FROM product WHERE prod_id = '". $prod_id ."';";

    //Respond Message
    if ($conn->query($sql) === TRUE) {
        echo "Record successfully deleted";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	$conn->close();
?>



