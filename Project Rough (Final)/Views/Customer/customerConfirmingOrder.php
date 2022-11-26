<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

 




?>



<html>
    <head>
        <title>Customer Dashboard</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="700px"  border="1" style="background-color:#FFFFE0;">
                    <tr><td align="center"><h1>Customer Confirming Order</h1></td></tr>
                    <tr><td><hr></td></tr>

                   <?php
                        if(isset($_GET['message']))
                        {
                            if($_GET['message'] == 'reg_success'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Welcome to your new account, '.$_COOKIE['username'].'!<b></p></td></tr>';  
                            }

                            else if($_GET['message'] == 'log_in_success'){

                                 echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Welcome back to your account, '.$_COOKIE['username'].'!<b></p></td></tr>'; 
                            }

                            else if($_GET['message'] == 'profile_picture_change_success'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Profile Picture Changed Successfully!<b></p></td></tr>';  
                            }
 
                            else if($_GET['message'] == 'order_placed'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Order Placed Successfully!<b></p></td></tr>';  
                            }

                            else if($_GET['message'] == 'order_received'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>You Just Received Your Order Delivery!<b></p></td></tr>';  
                            }

                            else if($_GET['message'] == 'all_done'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Delivery Complete!<b></p></td></tr>';  
                            }

                            

                            
                            
  
                        } 

                        else if(isset($_GET['err']))
                        {
                            if($_GET['err'] == 'restaurant_file_empty'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b> We Are Working On Our Restaurant List, Try Again!<b></p></td></tr>';  
                            }
                        }
                      ?>

                     

                    <tr>
                        <td   >
                            <table align="center" border="1" width="100%" height="100%" style="background-color:#E8F8F5;"  >
                        
                                
                                 
                                <tr>
                                <td width="30%">
                      <ul style="line-height:250%">

                      <li><b><a href="customerDashboard.php">Dashboard</a><br></li>
                     <li><a href="customerChoosingRestaurant.php">Place Order</a><br></li>
                    <?php if(isset($_COOKIE['orderApproved'])) 
            
            { echo "<li><a href='customerReceivingOrder.php'>Recieve Order</a><br></li>";} ?>

                     <li><a href="customerViewingOrderHistory.php">View Order History</a><br></li>
                     <li><a href="customerViewingProfile.php">View Profile</a></li>
                 
                     
                     <li><a href="logOut.php">LogOut</a></b></li>

                    </ul>
 
                        </td>

                        


                        <td align="center" >
                        <form method='post' action='placeOrder.php' enctype=''>
    <?php
echo"<table border='1' style='background-color:#FFFFE0;'>";

 

//session_start();

$j=$_SESSION['customerChoosingFoodItems.php']['i'];

//echo $j;

$selected_rows_count=0;

$total_bill=0;

$net_price=0;
 
$i=0;
$old_order_serial;
$file=fopen('orderSerial.txt','r');

while(!feof($file))
{ $old_order_serial=trim(fgets($file)); }

$old_order_serial=(int)$old_order_serial;

$new_order_serial=$old_order_serial+1;

fclose($file);

$file=fopen('orderSerial.txt','w');

fwrite($file,  $new_order_serial); 

fclose($file);

$restaurantName=$_COOKIE['restaurantName'];

$order_record=$new_order_serial.'|'. $_COOKIE['restaurantName'].'|'.'pending'.'|'.$_COOKIE['username'].'|'.$_COOKIE['address'];

 

echo "<tr><td colspan='5' align='center'><h3>Your Order</h3></td></tr> ";

echo "<tr><td><h3>Food Item Name</h3></td><td><h3>Image</h3></td>
          <td><h3>Quantity</h3></td><td><h3>Unit Price<br> </h3></td>
          <td><h3>Net Price<br> </h3></td>
     </tr> ";

 


while( $i<$j )
{
   if(isset($_POST['foodName'.$i]))
   {
    $selected_rows_count=$selected_rows_count+1;

    $foodName=$_POST['foodName'.$i];

    $selected_quantity=$_POST['selected_quantity'.$i];

    $foodPrice=$_COOKIE['food_price'.strval($i)];





    echo "<tr><td>".$foodName."</td> ";  

    echo "<td align='center' ><img src='allFoods/".$restaurantName."/".$foodName.".jpg' width='60px' height='60px'></td>  ";
    
    if($selected_quantity>0)
                {echo "<td align='center' >".$selected_quantity."</td>  ";}

    else        {header('location: customerChoosingFoodItems.php?err=quantity_not_set');}

    if(isset($foodPrice))
                {echo "<td align='center' > Tk. ".$foodPrice."</td>  ";

                    $net_price=$selected_quantity*$foodPrice;
                }

    echo "<td align='center' > Tk. ".$net_price."</td></tr> ";
    
    $total_bill=$total_bill+$net_price;

     

    $order_record=$order_record.'|'.$foodName.'|'.$selected_quantity.'|'.$foodPrice.'|'.$net_price;

   }
$i=$i+1;

}

 

echo "<tr><td colspan='5'><hr></td></tr> "; 

echo "<tr><td colspan='4' align='center'><h3>Total Bill </h3></td><td align='center'><h4> Tk. ".$total_bill."</h4></td></tr> "; 

echo "<tr><td colspan='5' align='center'> <input type='submit' value='Place Order'>&nbsp&nbsp&nbsp<input type='button' value='Cancel Order' onclick=location.href='customerChoosingRestaurant.php'></td></tr> "; 

if($selected_rows_count==0 ) {header('location:customerChoosingFoodItems.php?err=none_selected');}
 else if($total_bill==0)     {header('location:customerChoosingFoodItems.php?err=quantity_not_set');}


 
 echo "</table>";
 
  $_SESSION['customerConfirmingOrder.php']['$order_record']= $order_record;
?>
</form>
                       </td>
                    </tr>
                                
                                 
                               

                                 

                                 
                                
                                

                                

                                <tr>
                                    <td colspan="2"><hr></td>
                                </tr>

                                <tr align="center">
                                    <td style="background-color:#FFFFE0;" colspan="2"><a href="logOut.php"><p  style="color:red; font-size:20px;"><b>Log Out<b></p></a></td>
                                </tr>
                                 
                            </table>
                        </td>
                    </tr>
                </table>
            </fieldset>
         
    </body>
    </html>