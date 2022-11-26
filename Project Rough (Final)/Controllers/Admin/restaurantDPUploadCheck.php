<?php 
      session_start();
    //print_r($_FILES);
    
    $src = $_FILES['myfile']['tmp_name'];
    
     $des ="restaurantDP/".$_COOKIE['restaurantName'].".jpg";  
  
     
      
      

    if(move_uploaded_file($src, $des)){

        if($_SESSION['calledFrom']['previousPage']=='restaurantOwnerViewingProfile.php')
        {  header('location: restaurantOwnerViewingProfile.php?message=restaurant_pic_set_successfully');}
        else{
        header('location: adminChoosingRestaurantImage.php?message=restaurant_pic_set_successfully');}
    }
    
    else{
        header('location:  '.$_COOKIE['userType'].'Dashboard.php?message=restaurant_pic_setting_failed');
    }  
?>