<?php
session_start();
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="exam";


$conn= mysqli_connect ($dbServername, $dbUsername, $dbPassword, $dbName);
 
$message="this field is required";
 
if (isset($_POST['login'])) {
    
    	$Email = $_POST['email'];
	$Password = $_POST['password'];
    
    $query = "SELECT * FROM login WHERE Email='$Email' AND Password='$Password' LIMIT 1";
		$results = mysqli_query($conn, $query);
    
    
        header ('location: index.php');
      
   
	
}
	else {
			echo "Wrong username/password combination";
		}
