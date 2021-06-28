<?php
include'Top.incl2.php';
include ('AdminDataEntry.incl.php');
?>



<?php 

$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="exam";
$search=false;
$conn= mysqli_connect ($dbServername, $dbUsername, $dbPassword, $dbName);
$output='';
if(isset($_POST['searchbtn']))
{    
     
     $searchq= mysqli_real_escape_string($conn,$_POST['search']);
    // $searchq= preg_replace ("#[^0-9a-z]#i","",$searchq);
     $rec= mysqli_query($conn," SELECT * FROM admin_data WHERE Name LIKE '%$searchq%' OR  City_Name LIKE '%$searchq%'  LIMIT3");
     $record=mysqli_num_rows($rec);
    
    if ($record == 0){
        $output='there is no search result';
        
    }else {
        while ($row=mysql_fetch_assoc($rec) ){
                              
       $name= $row['Name'];
       $description= $row['Description'];
       $address= $row['Address'];
       $number= $row['Contact_Nbr'];
       $email= $row['Email'];
       $website= $row['Website_addr'];
       $city= $row['City_Name'];
       $file= $row['File_Name'];
       $image=base64_encode ($row['File_Name']);
       $image_desr= $row['Image_descr'];
            
        }
    }
    
                                
                
      
       
                        

    }
      ?>


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
    <a href="ViewUn.scripts.php" class="btn btn-warning">View full datails</a>
  </div>
</div> 
     <p> 
         <br/>
    
    </p>
</center> 
   




<?php 
    include'buttom.incl.php';
?>