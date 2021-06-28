<?php 
session_start();

$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="exam";

$conn= mysqli_connect ($dbServername, $dbUsername, $dbPassword, $dbName);
 
$first= $_POST['First'];
$Last= $_POST['Last'];
$password= $_POST['Password'];
$email= $_POST['Email'];

if(isset($_POST['signup']))
{
     $first= $_POST['First'];
     $Last= $_POST['Last'];
    $password= $_POST['Password'];
    $email= $_POST['Email'];

	 $sql = "INSERT INTO registration (FirstName,lastName,Password,Email)
	 VALUES ( '$first', '$Last', '$password', '$email' );";
	
       
             if (mysqli_query($conn, $sql)) {
		
                header("Location:Home.php");
	 
                } else {
	        	echo "Error: " . $sql . "
                 " . mysqli_error($conn);
	              }
        
        
	 mysqli_close($conn);
         
}