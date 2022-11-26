<?php

 
session_start();
if(isset($_SESSION['customerConfirmingOrder.php']['$order_record']))
{$order_record=trim($_SESSION['customerConfirmingOrder.php']['$order_record']);

    //echo "Found : ".$order_record;

    $file =fopen('allOrders.txt','a');
    fwrite($file,  $order_record."\r\n");    
   

    fclose($file);

    header('location: customerDashboard.php?message=order_placed');

}

 else{ 
    //echo "Not Found";

    header('location: customerDashboard.php?err=order_not_placed');
     }






?>