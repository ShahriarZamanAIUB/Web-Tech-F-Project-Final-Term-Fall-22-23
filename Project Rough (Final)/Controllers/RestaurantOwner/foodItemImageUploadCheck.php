<?php 

    //print_r($_FILES);

    $restaurantName=$_COOKIE['restaurantName'];

    $foodItemName=$_COOKIE['foodItemName'];
    
    $src = $_FILES['myfile']['tmp_name'];
    
  //  if(!isset($_FILES['myfile']['tmp_name'])){header('location: restaurantOwnerChoosingFoodItemImage.php?message=food_item_image_not_selected');}

    $des ='allFoods/'.$restaurantName.'/'.$foodItemName.'.jpg';
      
      

    if(move_uploaded_file($src, $des)){
        header('location:  restaurantOwnerChoosingFoodItemImage.php?message=food_item_image_set_success');
    }
    
    else{
        header('location:  restaurantOwnerChoosingFoodItemImage.php?message=food_item_image_set_failed');
    }  
?>