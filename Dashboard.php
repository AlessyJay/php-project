<?php 
include ('AdminDataEntry.incl.php');

   if(isset($_GET['edit'])){ 

       $id= $_GET['edit'];
       $rec= mysqli_query($conn," SELECT * FROM admin_data where Resto_Id=$id");
       $record=mysqli_fetch_array($rec);
       $edit_state=true;
      $name= $record['Name'];
       $description= $record['Description'];
       $address= $record['Address'];
       $number= $record['Contact_Nbr'];
       $email= $record['Email'];
       $website= $record['Website_addr'];
       $city= $record['City_Name'];
       $file= base64_encode($record['File_Name']);
       $image=base64_encode ($record['File_Name']);
       $image_desr= $record['Image_descr'];
       
       
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
   <h1>  <center>  <i>Admin playGround </i> </center>  </h1>
  <div class="row">
      <?php if(isset($_SESSION['msg'])) { ?>
        <div class="card text-white bg-primary mb-3">
        <?php 
                   echo $_SESSION['msg'];
                  
        ?>         
  </div>  
      
      <?php } 
      else {
         unset($_SESSION['msg']);  
      }
      ?>
      
      
      <table class="table table-striped">
  <thead>
    <tr>

      <th scope="col">Resto-Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Website</th>
      <th scope="col">Actions</th>
        <th scope="col">Actions</th>
        
    </tr>
  </thead>
  <tbody>
      <?php while( $row= mysqli_fetch_array($result) ) { ?>
    <tr>
    <th scope="row"><?php echo $row['Name'];?> </th>
      <td><?php echo $row['Address'];?></td>
      <td><?php echo $row['Email'];?>  </td>
      <td><?php echo $row['Website_addr'];?>  </td>
      <td> <a class="btn btn-success" href="Dashboard.php?edit=<?php echo $row['Resto_Id']; ?>"> edit </a></td> 
      <td> <a  class="btn btn-danger"href="AdminDataEntry.incl.php?delete=<?php echo $row['Resto_Id'];?>"> Delete </a></td>
    </tr>
    
<?php  } ?>
   
      
    </tbody>
</table> 
      
       
    <div class="col-sm">  </div>
    <div class="col-sm"> 
        
            <p> 
        </p>
  <form method="post" action="" enctype="multipart/form-data">
      
      <?php  if ($edit_state == false ) { ?>
      
       <div class="card text-white bg-primary mb-3">
       <center> ADD A HOTEL</center>
  </div>
      <?php } else{ ?>
      
       <div class="card text-white bg-success mb-3">
       <center> EDIT INFORMATION</center>
  </div>
      
      <?php } ?>
      
      
  
        <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="form-group">
    <label for="exampleInputEmail1">Restourant Name</label>
    <input type="text" class="form-control"  name="Resto_name" value="<?php echo $name; ?>" required>
    </div>
    
      <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" class="form-control"  name="Resto_descr" value="<?php echo $description;?>" required>
    </div>
    
      <div class="form-group">
    <label for="exampleInputEmail1">Address</label> 
    <input type="text" class="form-control"  name="Resto_address" value="<?php echo $address; ?>" required>
    </div>
    
      <div class="form-group">
    <label for="exampleInputEmail1">Contact number</label>
    <input type="text" class="form-control" name="Resto_nbr" value="<?php echo $number; ?>" required>
    </div>
       
      <div class="form-group">
    <label for="exampleInputEmail1">email</label>
    <input type="email" class="form-control"  name="Email" value="<?php echo $email; ?>" required>
    </div>
    
      <div class="form-group">
          <label for="exampleInputEmail1">website </label>
    <input type="text" class="form-control"  name="Website" value="<?php echo $website; ?>" required>
    </div>
      
      
  <div class="form-group">
    <label for="exampleInputEmail1">city located in </label>
    <input type="text" class="form-control"  name="City" value="<?php echo $city; ?>" required>
    
  </div>
      
 <div class="form-group">
    <label for="exampleFormControlFile1">file</label>
    <input type="file" class="form-control-file" name="Image" accept="image/*"  value="<?php echo $file; ?>" required>
  </div>
      
 <div class="form-group">
    <label for="exampleInputPassword1">Image descr</label>
    <input type="text" class="form-control"   name="Image_descr" value="<?php echo $image_desr; ?>" required>
  </div>
 
  <?php  if ($edit_state == false ) { ?>
      <button type="submit" class="btn btn-primary" name="save">save </button>
      <?php } else{ ?>
      <button type="submit" class="btn btn-success" name="edit">edit </button>
      
      <?php } ?>
      
       
      <br/>
     
       
</form>
        
    
        
      
      
      </div>
    <div class="col-sm"> 
      
      </div>
  </div>
</div>
    
    
    
    
  
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
    
  
 
<div class="card-footer ">  
       
        
        <nav class="navbar navbar-light bg-light">
              <div class="container">
  
  <div class="row">
    <div class="col-8"> 
        <small>  Our Campany is a division of Hotels Partners Ltd.
                This Site is rated 9.48/10 on GoAbroad based on 105 reviews. 
        </small>
      </div>
    <div class="col-4"> 
       <a href="HomeUnregistered.php">UI </a>  &nbsp; <a href="#"> Carrers</a>  &nbsp; <a href="#"> Privacy</a>  &nbsp; <a href="logout.php"> logout</a>
      </div>
  </div>
</div>
            
            
  
</nav>
        </div> 
    
</html>
<p>


</p>

 