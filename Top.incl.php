<?php
session_start();
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
        
        
         <div class="fixed-top">
        
             <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    
        
        <form class="form-inline my-2 my-lg-0" autocomplete="off">
      <input class="form-control mr-sm-2" type="search" placeholder="Search by name" name="search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  
 
        
        <li class="nav-item">
               <?php
 if($_SESSION["Email"]) {
  ?>

     Welcome <?php echo $_SESSION["Email"]; ?>
<a class="btn btn-primary" href="logout.php" tite="Logout">Logout </a>
<?php
}else {
    echo " <h1><i> Login first <i> </h1>";
     
 } 
?>
      
        
    </ul>
  </div>
</nav>
        
        </div>
        
 