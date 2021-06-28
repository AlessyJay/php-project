 <?php 
include'Top.incl.php';
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="exam";

$conn= mysqli_connect ($dbServername, $dbUsername, $dbPassword, $dbName);
 
$i=0;
$name= "";
$description= "";
$address= "";
$number="";
$email= "";
$website= "";
$city= "";
$file= "";
$image_desr="";

$global=$_GET['view'];

if(isset($_GET['view']))
{
    $id=$_GET['view'];
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


if (isset($_POST['submit']))
{    $global1=$_POST['global'];
     $rname=$_POST['reviewer'];
     $ratings=$_POST['rating'];
     $review=$_POST['review'];
     $sql1 = "INSERT INTO rating ( Ratings,Resto_id)           VALUES ('$ratings','$global') ";
     $sql2 = "INSERT INTO review ( Reviewer, Comment,Resto_id) VALUES ('$rname','$review','$global')";
        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql2);
}

$sql1=" SELECT * FROM review where Resto_id=$global LIMIT 4 "; 
$sql2=" SELECT * FROM rating where Resto_id=$global LIMIT 4"; 
   $result1=mysqli_query($conn,$sql1);
   $result2=mysqli_query($conn,$sql2);


?> 
<p>
<br/>
</p>
<center>     <div class="card" style="width: 18rem;">
  <img src=" <?php echo $record['File_Name']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $name; ?></h5>
    <p class="card-text"><?php echo $description; ?></p>
    <a href="#" class="btn btn-primary">Go to their site</a>
  </div>
    </div> <hr> </center>


<center> <h2>Leave a Review</h2> </center>


<div class="container">
  <div class="row">
    <div class="col">
      
    </div>
    <div class="col-6">
      
          <form method="post" >
  <div class="form-group">
    <label for="exampleFormControlInput1">Reviewer Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="jon" name="reviewer" required>
    </div>
              
    <div class="form-group">
    <input type="hidden" class="form-control" id="exampleFormControlInput1"  name="global" value="<?php echo $global?>" >
  </div>
  <div class="form-check" >
      
  <input class="form-check-input" type="radio" value="5" id="exampleRadios1" name="rating" checked>
  <label class="form-check-label" for="exampleRadios1">Best choise </label> <br/>
      
  <input class="form-check-input" type="radio" value="4" id="exampleRadios1" name="rating" checked>
  <label class="form-check-label" for="exampleRadios1">Good quality</label> <br/>
      
  <input class="form-check-input" type="radio" value="3" id="exampleRadios1" name="rating" checked>
  <label class="form-check-label" for="exampleRadios1">Neutral </label> <br/>
      
  <input class="form-check-input" type="radio" value="2" id="exampleRadios1" name="rating" checked>
  <label class="form-check-label" for="exampleRadios1">something need change </label> <br/>
      
  <input class="form-check-input" type="radio" value="1" id="exampleRadios1" name="rating" checked>
  <label class="form-check-label" for="exampleRadios1">Don't even come near by </label> <br/>
      
      
      
</div>
  <div class="form-group">
      <br/>
    <label for="exampleFormControlTextarea1">Review</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="review" rows="4" required></textarea>
  </div>
              <button type="submit" class="btn btn-primary mb-2" name="submit">Submit your review</button>
</form>
        
        
    </div>
    <div class="col">
        
    </div>
  </div>
  
</div>
    <hr>
       <center> <h2> Reviews</h2> </center>

    
    
    
    
    
    
    <div class="container">
  <div class="row">
    <div class="col">
    <?php while ($row1= mysqli_fetch_array($result1) ) { 
        while ($row2= mysqli_fetch_array($result2)) {
        ?>
          
        <div class="card border-primary mb-3" style="max-width: 25rem;">
            <div class="card-header bg-transparent border-warning"> <b> <?php echo $row1['Reviewer'];?> </b></div>
  <div class="card-body text-dark">
    <h5 class="card-title"> </h5>
    <p class="card-text"> <?php echo $row1['Comment'];?></p>
  </div>
            
  <div class="card-footer bg-transparent border-secondary"><?php
            echo $row1['Reviewer']." gave a rating of ". $row2['Ratings'] . "✰"; ?></div>
</div>
      <?php } }?>
    </div>
    <div class="col-md-auto">
    
    </div>
    <div class="col col-lg-2">

    </div>
  </div>
</div>

<?php 
    include'buttom.incl.php';
?>
