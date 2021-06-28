<?php
session_start();
$message="";
if(count($_POST)>0) {
    $dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="exam";


$conn= mysqli_connect ($dbServername, $dbUsername, $dbPassword, $dbName) or die('Unable To connect');

$result = mysqli_query($conn, "SELECT * FROM registration WHERE Password='" . $_POST["password"] . "' and Email = '". $_POST["email"]."'");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["ID"] = $row['ID'];
$_SESSION["Email"] = $row['Email'];
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["ID"])) {
header("Location:Home.php");
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
      <title> Restaurants </title>
  </head>
   
  <body>  
    
    <div class="container">
   <h1>  <center>  <i> Nice to see you back </i> </center>  </h1>
  <div class="row">
    <div class="col-sm">  </div>
    <div class="col-sm">
        <p>  welcome back </p>
    <br/>
  <form method="post" action="Login.php">
      
      <div class="message"><?php if($message!="") { echo $message; } ?></div>

  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control"  placeholder="Email" name="email">
  </div>
      
 <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control"  placeholder="Password" name="password">
  </div>
 
  
      
      <button type="submit" class="btn btn-primary"> LogIn </button>
       
      <br/>
      
      Not yet a member <a href="index.php"> Register</a>
      
</form>
           
      
      
      </div>
    <div class="col-sm"> 
      
      </div>
  </div>
</div>
    
    
    
    
  
    

  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
      <div class="fixed-bottom">  
       
        
        <nav class="navbar navbar-light bg-light">
              <div class="container">
  
  <div class="row">
    <div class="col-8">
        <small>  Our Campany is a division of Hotels Partners Ltd. 
                 This Site is rated 9.48/10 on GoAbroad based on 105 reviews. 
        </small>
      </div>
    <div class="col-4"> 
     <a href="#"> Carrers</a>  &nbsp; <a href="#"> Privacy</a>  &nbsp; <a href="#"> Coockies</a>
      </div>
  </div>
</div>
    
</html>