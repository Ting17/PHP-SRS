<?php
    include('dbconnect.php');

    if(isset($_POST['Username']) || isset($_POST['Password'])){
        
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];

        $result = $conn->query("SELECT * FROM member where Username = '" . $Username . "' and Password = '" . $Password . "';");

        if($result -> num_rows > 0) {    
           echo "You are member"; //if not using.$.trim use exit();
        }
        else{
           $result = $conn->query("SELECT * FROM employee where Username = '" . $Username . "' and Password = '" . $Password . "';");

            if($result -> num_rows > 0) {
                echo "admin";
            }
            else{
                echo "You are not a member yet." ;
            }
        }
	   $conn->close();
    }
?>


