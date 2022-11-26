<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

$file=fopen('VAT.txt','r');
$tax_value=(int)trim(fgets($file));

fclose($file);

 



    echo "<html><head><title>Customer Receiving Delivery</title></head>";
    echo "<body>";
        
    echo "<fieldset>";
    echo " <legend><p  style='font-size:20px;'>Food Court Management System</p></legend>";
    echo "<table align='center' height='700px' width='800px'  border='1'>";
    echo "<tr><td align='center'><h1>Confirm Your Delivery <p  style='color:green;'>  </p> </h1></td></tr>";
    echo "<tr><td><hr></td></tr>";

                    
                        if(isset($_GET['message']))
                        { 
                            
                           // if($_GET['message'] == 'order_approved'){
                            //    echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Order Approved!<b></p></td></tr>';  
                           // }

                             

                            
  
                        } 

                        if(isset($_GET['err']))
                        { 
                            
                              if($_GET['err'] == 'order_not_approved'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Select an Order First!<b></p></td></tr>';  
                            }

                            else if($_GET['err'] == 'delivery_not_complete'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Select an Order First!<b></p></td></tr>';  
                            }

                             

                            
  
                        } 
                       

                     

                        echo "<tr><td><table align='center' border='1' width='100%' height='100%'  >";
                        
                                
                                 
                        echo "<tr>";
                        echo "<td width='30%'>";
                        echo "<ul style='line-height:250%'>";

                        echo "<li><b><a href='customerDashboard.php'>Dashboard</a><br></li>";
                        echo "<li><a href='customerChoosingRestaurant.php'>Place Order</a><br></li>";

                                 if(isset($_COOKIE['orderApproved'])) 
                                 { echo "<li><a href='customerReceivingOrder.php'>Recieve Order</a><br></li>";}  

                                echo " <li><a href='customerViewingOrderHistory.php'>View Order History</a><br></li>";
                                 echo "<li><a href='customerViewingProfile.php'>View Profile</a></li>";
                               //  echo "<li><a href='editProfile.php'>Edit Profile</a></li>";

                                 echo "<li><a href='logOut.php'>LogOut</a></b></li>";

                                 echo "</ul>";
 
                                 echo "</td>";

                        


                                 echo "<td align='center'>";  
                                 echo "<table >";  
                                 echo "<tr><td colspan='2' border='1'> ";
                       
$username=$_COOKIE['username'];

$order_count=0;
$items_ordered;
 

$file=fopen('allOrders.txt','r');
echo "<form method='post' action='customerVerifyingOrderReceival.php' enctype=''>";

echo "<html><head></head><body><table width='500px'  ><tr><th><u>All of Your Orders</u></th></tr>";
while(!feof($file))
{
 
$record=fgets($file);
$record_elements=explode('|',$record);

if(isset($record_elements[0]) && isset($record_elements[1]))
   { if($record_elements[3]==$username && $record_elements[2]=='approved')
    { $total_price=0;
         $record_line_no=$record_elements[0];
    echo "<tr><td><table border='1' width='100%' bgcolor='#FDEBD0'>";

    echo "<tr><th colspan='4'>Order No. ".strval($order_count+1)." "; $order_count=$order_count+1;

    echo " ---(Select : <input type='radio' name='selectedOrder' value='".$record_line_no."' checked>)</th></tr>";
    echo "<tr><td><hr></td><td colspan='3'><hr></td></tr>";  
    
    $restaurantName=$record_elements[1];
    echo "<tr><th align='center' width='200px'>Customer : </td><td align='center' colspan='3'>".$record_elements[3]."</td></tr>"; 
    echo "<tr><th align='center' width='200px'>Customer's Address : </td><td align='center' colspan='3'>".$record_elements[4]."</td></tr>";
    echo "<tr><th align='center' width='200px'>Restaurant : </td><td align='center' colspan='3'>".$restaurantName."</td></tr>"; 
 
    echo "<tr><td><hr></td><td colspan='3'><hr></td></tr>";  
    $items_ordered=(count($record_elements)-5)/4;
    

    echo "<tr><th align='center'><u>Food Item Name</u></th><th><u>Quantity</u></th><th><u>Unit Price</u></th><th><u>Net Price</u></th></tr>";

    for($i=5; $i<=4+$items_ordered*4;$i=$i+4)
    {
        echo "<tr><td align='center'>".$record_elements[$i]."</td><td align='center'>".$record_elements[$i+1]."</td><td align='center'> Tk. ".$record_elements[$i+2]."</td><td align='center'> Tk. ".$record_elements[$i+3]."</td></tr>";

        $total_price=$total_price+$record_elements[$i+3];  

    }
     
    $totalPriceWithVAT=round($total_price+($total_price*$tax_value/100));
     echo "<tr><td align ='center'><b>Total Price (VAT included)</b></td><td align='center' colspan='3'> <b>Tk.".$totalPriceWithVAT."</b></td></tr>";
    
    setcookie('restaurantName',$restaurantName,time()+60*60, '/');
    setcookie('totalPriceWithVAT',$totalPriceWithVAT,time()+60*60, '/');
   

   

    echo "</table></td></tr>";

    echo "<tr><td colspan='4'>&nbsp</td></tr>"; 
    echo "<tr><td colspan='4'>&nbsp</td></tr>"; 

   }

}
 
}
echo "<tr><td   align='center'>Accept Delivery? : Yes : <input type='radio' name='decision' value='yes' checked> &nbsp No :  <input type='radio' name='decision' value='no'> <input type='submit' value='Update Order'></input></td></tr>";
echo "</table></body></html/form>";

 
 

 
echo "</td></tr>";

                          

                     

echo "</table>";
echo "</td>";
echo "</tr>";
                                
                                 
                               

                                 

                                 
                                
                                

                                

echo "<tr>";
echo "<td colspan='2'><hr></td>";
echo "</tr>";

echo "<tr align='center'>";
echo "<td colspan='2'><a href='logOut.php'><p  style='color:red; font-size:20px;'><b>Log Out<b></p></a></td>";
echo "</tr>";
                                 
echo "</table>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</fieldset>";
         
echo "</body>";
echo "</html>";

    ?>