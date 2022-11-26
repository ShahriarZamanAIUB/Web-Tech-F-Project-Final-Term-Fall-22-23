<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

?>



<html>
    <head>
        <title>All of The Orders</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="800px"  border="1">
                    <tr><td align="center"><h1>Choose Orders to Approve <p  style="color:green;"> <?php echo '('.$_COOKIE["restaurantName"].')'; ?></p> </h1></td></tr>
                    <tr><td><hr></td></tr>

                   <?php
                        if(isset($_GET['message']))
                        { 
                            
                            if($_GET['message'] == 'order_approved'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Order Approved!<b></p></td></tr>';  
                            }

                            else  if($_GET['message'] == 'no_values'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Wait for Customers to Order!<b></p></td></tr>';  
                            }

                            

                             

                            
  
                        } 

                        if(isset($_GET['err']))
                        { 
                            
                              if($_GET['err'] == 'order_not_approved'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Select an Order first!<b></p></td></tr>';  
                            }

                            
  
                        } 
                      ?>

                     

                    <tr>
                        <td>
                            <table align="center" border="1" width="100%" height="100%"  >
                        
                                
                                 
                                <tr>
                                <td width="30%">
                      <ul style="line-height:250%">

                      <li><b><a href="restaurantOwnerDashboard.php">Dashboard</a><br></li>
              
                     <li><a href="restaurantOwnerAddingFoodItems.php">Add Food Item</a><br></li>
                     <li><a href="restaurantOwnerViewingMenu.php">View Menu</a><br></li>
                     <li><a href="restaurantOwnerViewingOrders.php">Approve Orders</a><br></li>
                     <li><a href="restaurantOwnerViewingProfile.php">View Profile</a></li>
                     <li><a href="editProfile.php">Edit Profile</a></li>
                     <li><a href="logOut.php">LogOut</a></b></li>

                    </ul>
 
                        </td>

                        


                        <td align="center"   >  
                        <table >    
                      <tr><td colspan="2" border="1"  > 
                      <?php
$restaurantName=$_COOKIE['restaurantName'];

$order_count=0;
$items_ordered;
 

$file=fopen('allOrders.txt','r');
echo "<form method='post' action='restaurantOwnerVerifyingOrdersCheck.php' enctype=''>";

echo "<html><head></head><body><table width='500px'  ><tr><th><u>All Orders to this Restaurant</u></th></tr>";
while(!feof($file))
{
 
$record=fgets($file);
$record_elements=explode('|',$record);

if(isset($record_elements[0]) && isset($record_elements[1]))
   { if($record_elements[1]==$restaurantName && $record_elements[2]=='pending')
    { $total_price=0;
         $record_line_no=$record_elements[0];
    echo "<tr><td><table border='1' width='100%' bgcolor='#EBF5FB'>";

    echo "<tr><th colspan='4'>Order No. ".strval($order_count+1)." "; $order_count=$order_count+1;

    echo " ---(Select : <input type='radio' name='selectedOrder' value='".$record_line_no."' checked>)</th></tr>";
    echo "<tr><td><hr></td><td colspan='3'><hr></td></tr>";  

    echo "<tr><th align='center' width='200px'>Customer : </td><td align='center' colspan='3'>".$record_elements[3]."</td></tr>"; 
    echo "<tr><th align='center' width='200px'>Address : </td><td align='center' colspan='3'>".$record_elements[4]."</td></tr>"; 
    echo "<tr><td><hr></td><td colspan='3'><hr></td></tr>";  
    $items_ordered=(count($record_elements)-5)/4;
    

    echo "<tr><th align='center'><u>Food Item Name</u></th><th><u>Quantity</u></th><th><u>Unit Price</u></th><th><u>Net Price</u></th></tr>";

    for($i=5; $i<=4+$items_ordered*4;$i=$i+4)
    {
        echo "<tr><td align='center'>".$record_elements[$i]."</td><td align='center'>".$record_elements[$i+1]."</td><td align='center'>".$record_elements[$i+2]."</td><td align='center'>".$record_elements[$i+3]."</td></tr>";

        $total_price=$total_price+$record_elements[$i+3];  
    }

     echo "<tr><td align ='center'>Total Price</td><td align='center' colspan='3'> <b>Tk.".$total_price."</b></td></tr>";
    

   

   

    echo "</table></td></tr>";

    echo "<tr><td colspan='4'>&nbsp</td></tr>"; 
    echo "<tr><td colspan='4'>&nbsp</td></tr>"; 

   }

}
 
}
echo "<tr><td   align='center'>Approve? : Yes : <input type='radio' name='decision' value='yes' checked> &nbsp No :  <input type='radio' name='decision' value='no'> <input type='submit' value='Update Order'></input></td></tr>";
echo "</table></body></html/form>";

 
 

?>
                         </td></tr>

                          

                     

                       </table>
                       </td>
                    </tr>
                                
                                 
                               

                                 

                                 
                                
                                

                                

                                <tr>
                                    <td colspan="2"><hr></td>
                                </tr>

                                <tr align="center">
                                    <td colspan="2"><a href="logOut.php"><p  style="color:red; font-size:20px;"><b>Log Out<b></p></a></td>
                                </tr>
                                 
                            </table>
                        </td>
                    </tr>
                </table>
            </fieldset>
         
    </body>
    </html>