<?php 
session_start();
$edit_state = false;
$search_state=false;
$id=4;
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="exam";

$conn= mysqli_connect ($dbServername, $dbUsername, $dbPassword, $dbName);
 
$name= "";
$description= "";
$address= "";
$number="";
$email= "";
$website= "";
$city= "";
$file= "";
$image_desr="";



if(isset($_POST['save']))
{
            
                
$name= $_POST['Resto_name'];
$description= $_POST['Resto_descr'];
$address= $_POST['Resto_address'];
$number= $_POST['Resto_nbr'];
$email= $_POST['Email'];
$website= $_POST['Website'];
$city= $_POST['City'];
$file=($_FILES['Image']['name']);
$image=$_FILES['Image']['tmp_name'];
$image_desr= $_POST['Image_descr'];

	
    if (preg_match("!image!", $_FILES['Image']['type'])) {
        
        if (copy ($_FILES['Image']['tmp_name'],$file)){
            
           
            
             $sql1 = "INSERT INTO restaurants (Name, Description, Address, Contact_Nbr, Email, Website_addr) VALUES ('$name','$description','$address','$number','$email','$website') ";
            
            $sql2 = "INSERT INTO city ( City_Name ) VALUES ('$city') "; 
            
            $sql3 = "INSERT INTO image ( File_Name, Image_descr) VALUES ('$file','$image_desr') ";
            
             mysqli_query($conn, $sql1);
             mysqli_query($conn, $sql2);
             mysqli_query($conn, $sql3);
            $_SESSION['msg']=" Data added!";
            header("Location:Dashboard.php");
	
            
        }
    }
	 mysqli_close($conn);
}

   if (isset($_POST['edit'])) {
     
           $id= $_POST['id'];
           $name= $_POST['Resto_name'];
           $description=  $_POST['Resto_descr'];
           $address= $_POST['Resto_address'];
           $number= $_POST['Resto_nbr'];
           $email= $_POST['Email'];
           $website= $_POST['Website'];
           $city= $_POST['City'];
           $file= $_FILES['Image']['name'];
           $image= FILES['Image']['tmp_name'];
           $image_desr= $_POST['Image_descr'];
           
          
         $sql1=" UPDATE restaurants 
         SET   Name='$name',Description='$description',Address='$address',Contact_Nbr='$number',Email='$email',Website_addr='$website'
         WHERE Resto_Id=$id ";          
         
        $sql2=" UPDATE city 
        SET  City_Name='$city' 
        WHERE City_Id=$id ";          
         
        $sql3=" UPDATE image 
        SET File_Name='$file',Image_descr='$image_desr' 
        WHERE Image_Id=$id ";
       
       
       mysqli_query($conn,$sql1);
       mysqli_query($conn,$sql2);
       mysqli_query($conn,$sql3);
       
       $_SESSION['msg']="Data Updated!";
       header ("location:Dashboard.php");
 }
  if (isset($_GET['delete'])) {
      
      $id=$_GET['delete'];
      $sql1=" DELETE FROM restaurant  WHERE Resto_Id=$id"; 
      $sql2=" DELETE FROM city  WHERE City_Id=$id"; 
      $sql3=" DELETE FROM image  WHERE Image_Id=$id"; 
       mysqli_query($conn,$sql1);
       mysqli_query($conn,$sql2);
       mysqli_query($conn,$sql3);
      
       $_SESSION['msg']="Data Deleted!";
       header ("location:Dashboard.php");
  }
if (isset($_GET['view'])) {
      
      $id=$_GET['view'];
      $sql1=" SELECT * FROM restaurant  WHERE Resto_Id=$id"; 
      $sql2=" SELECT * FROM city  WHERE City_Id=$id"; 
      $sql3=" SELECT * FROM image  WHERE Image_Id=$id"; 
       mysqli_query($conn,$sql1);
       mysqli_query($conn,$sql2);
       mysqli_query($conn,$sql3);
      
       $_SESSION['msg']="Read info!";
       header ("location:ViewUnregistered.php");
  }
   
   $sql=" SELECT * FROM admin_data"; 
   $result=mysqli_query($conn,$sql);

  

