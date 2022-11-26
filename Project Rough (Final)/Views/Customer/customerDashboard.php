<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

else if(!isset($_COOKIE['orderApproved']))
{$file=fopen('allOrders.txt','r');
    $found=false;
while(!feof($file))
{
   $record=trim(fgets($file));

   $record_items=explode('|',$record);

   if(isset($record_items[3]) && isset($record_items[2]))
   {
     if($record_items[3]==$_COOKIE['username'] && $record_items[2]=='approved')
    {    
        $found=true;
          //setcookie('orderApproved',true,time()+60*60,'/');
        break;


    } 


  }

}

if($found==true){setcookie('orderApproved',true,time()+60*60,'/');

    header('location: customerDashboard.php?message=order_received');}

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
                    <tr><td align="center"><h1>Customer Dashboard</h1></td></tr>
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
                        <td>
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
                     <li><a href="customerEditingProfile.php">Edit Profile</a></li>
                      
                     
                     <li><a href="logOut.php">LogOut</a></b></li>

                    </ul>
 
                        </td>

                        


                        <td>
                        <table border="1" width="80%" align="center" style="background-color:#FFFFE0;">    
                      <tr><td colspan="2" align="center"> 
                        <?php  if(isset($_COOKIE['username']))
                                    {   if(file_exists("customerDP/".$_COOKIE['username'].".jpg"))
                                                      {echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="customerDP/'.trim($_COOKIE['username']).'.jpg?t='.time().'" height="120px" width="120px"></img><br><br>';} 
                            
                                      else{            echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="default_dp.jpg" height="120px" width="120px"></img><br><br>';    }
                                    }

                                 else{echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="default_dp.jpg" height="120px" width="120px"></img><br><br>';}   
                        
                        ?> 
                         </td></tr>

                         <tr> <td align="center" colspan="2"> 
                        <form method="POST" action="../../Controllers/customerDPUploadCheck.php" enctype="multipart/form-data" >
                                Change Profile Picture: <br><br> <input type="file" name="myfile" value="" />
                          <br><input type="submit" name="submit" value="Update"/>
                        </form>
                     </td></tr>

                     <tr> <td colspan="2"> <hr>  </td></tr>


                      <tr><td style="padding:10px"><b>Username:</td><td>  <?php echo $_COOKIE['username']; ?></td></tr> 
                      
                      <tr><td style="padding:10px"><b>Balance:</td><td> Tk. <?php echo $_COOKIE['balance']; ?></td> </tr>

                       </table>
                       </td>
                    </tr>
                                
                                 
                               

                                 

                                 
                                
                                

                                

                                <tr>
                                    <td colspan="2"><hr></td>
                                </tr>

                                <tr align="center">
                                    <td style="background-color:#FFFFE0;" colspan="2"><a href="../../Controllers/logOut.php"><p  style="color:red; font-size:20px;"><b>Log Out<b></p></a></td>
                                </tr>
                                 
                            </table>
                        </td>
                    </tr>
                </table>
            </fieldset>
         
    </body>
    </html>