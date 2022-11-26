<?php 

    //print_r($_FILES);
    
    $src = $_FILES['myfile']['tmp_name'];
    
     
    $des ="customerDP/".$_COOKIE['username'].".jpg";
      
      

    if(move_uploaded_file($src, $des)){
       
         
        
         header('location: customerDashboard.php?message=profile_picture_change_success');
    }
    
    else{
        header('location:  customerDashboard.php?message=profile_picture_change_failed');
    }  
?>