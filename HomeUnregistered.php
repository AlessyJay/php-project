<?php
include'Top.incl2.php';
include ('AdminDataEntry.incl.php');
?>


<?php 
while( $row= mysqli_fetch_array($result) ) { ?>

<center> 
     <p> 
         <br/>
    
    </p>
    <div class="card" style="width: 50rem;">
    
  <img src="<?php echo $row['File_Name'];?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"> <?php echo $row['Name'];?> </h5>
        <p class="card-text"> <?php echo $row['Address'];?> </p>
        <p class="card-text"> <?php echo $row['Email'];?> </p>
        <p class="card-text"> <?php echo $row['Website_addr'];?> </p>
    <a href="ViewUn.scripts.php?view=<?php echo $row['Resto_Id'];?>" class="btn btn-warning">View full datails</a>
  </div>
</div> 
     <p> 
         <br/>
    
    </p>
</center> 
   
<?php  }
      ?>



<?php 
    include'ButtomUn.php';
?>