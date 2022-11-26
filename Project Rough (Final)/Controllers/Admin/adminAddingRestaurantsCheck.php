<?php
session_start();
$restaurantName=trim($_POST['restaurantName']);
$restaurantAddress=trim($_POST['restaurantAddress']);
$restaurantBalance=trim($_POST['restaurantBalance']);
$restaurantOwnerName=trim($_POST['restaurantOwnerName']);
$restaurantOwnerEmail=trim($_POST['restaurantOwnerEmail']);
$restaurantOwnerPassword=trim($_POST['restaurantOwnerPassword']);

$already_exists=false;

if($restaurantName == "" || $restaurantAddress == "" || $restaurantBalance == "" ||$restaurantOwnerName==""||$restaurantOwnerPassword==""){
    //echo "Null values"; 
    
    header('location: adminAddingRestaurants.php?err=null');

    
}

else{
    

    $file=fopen('allRestaurantOwners.txt','r');
      
    while(!feof($file))
    {
        $record=trim(fgets($file));

        $record_elements=explode("|",$record);

         //print($record_elements[2]);

        if(isset($record_elements[0]) && isset($record_elements[2]) && isset($record_elements[3]) )
       { 
        if($restaurantOwnerName==$record_elements[0] || $restaurantOwnerEmail==$record_elements[2] || $restaurantName==$record_elements[3])
        {  // echo "\r\nMatch found!\r\n";
            $already_exists=true;

             break;

        }
       }



    }

    if( $already_exists==true){

        header('location: adminAddingRestaurants.php?err=already_taken');
    }

    else{

$restaurant_record=$restaurantOwnerName.'|'.$restaurantOwnerPassword.'|'.$restaurantOwnerEmail.'|'.$restaurantName.'|'.$restaurantAddress.'|'.$restaurantBalance;


//$file =fopen('allRestaurantOwners.txt','r');




///
$file =fopen('allRestaurantOwners.txt','a');
fwrite($file,  $restaurant_record."\r\n");    
        

fclose($file);

 
    
mkdir("allFoods/".$restaurantName."/");

$file=fopen('allFoods/'.$restaurantName.'/allFoodNames.txt','w');

 fclose($file);

 setcookie('restaurantName',$restaurantName,time()+60*60*3,'/');
 

header('location: adminChoosingRestaurantImage.php?message=restaurant_added');

    }
}
?>