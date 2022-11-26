<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

?>



<html>
    <head>
        <title>Admin Viewing Profile</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="700px"  border="1"  >
                
                    <tr><td align="center"><h1>Admin Profile Information</h1></td></tr>
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
                            <table align="center" border="1" width="100%" height="100%"   > 
                             
                        
                                
                                 
                                <tr>
                                <td width="30%">
                      <ul style="line-height:250%">

                      <li><b><a href="adminDashboard.php">Dashboard</a><br></li>
                     <li><a href="adminAddingRestaurants.php">Add Restaurant</a><br></li>
                     <li><a href="adminViewingRestaurants.php">View Restaurants</a><br></li>
                     <li><a href="adminSettingVATRate.php">Set VAT rate</a><br></li>
                     <li><a href="adminViewingProfile.php">View Profile</a></li>
                     <li><a href="adminEditingProfile.php">Edit Profile</a></li>
                     
                     <li><a href="logOut.php">LogOut</a></b></li>

                    </ul>
 
                        </td>

                        


                        <td>
                        <table border="1" align="center" width="80%"  style="background-color:#FFFFE0;"> <!╌Skin Color ╌>   
                      <tr><td colspan="2" align="center" colspan="2"> 
                        <?php  if(isset($_COOKIE['username']))
                                    {   if(file_exists("adminDP/".$_COOKIE['username'].".jpg"))
                                                      {echo '<img    style="border:5px solid #000000; padding:3px; margin:5px"; src="adminDP/'.trim($_COOKIE['username']).'.jpg?t='.time().'" height="120px" width="120px"></img><br><br>';} 
                            
                                      else{            echo '<img    style="border:5px solid #000000; padding:3px; margin:5px"; src="default_dp.jpg" height="120px" width="120px"></img><br><br>';    }
                                    }

                                 else{echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="default_dp.jpg" height="120px" width="120px"></img><br><br>';}   
                        
                        ?> 
                         </td></tr>

                          

                     <tr> <td colspan="2"> <hr>  </td></tr>


                      <tr><td style="padding:10px">Username:    </td><td> <b> <?php echo $_COOKIE['username'];  ?>   </b>     </td></tr> 
                      <tr><td style="padding:10px">E-mail:      </td><td> <b> <?php echo $_COOKIE['email'];     ?>   </b>     </td></tr> 
                      <tr><td style="padding:10px">Password:    </td><td> <b> <?php echo $_COOKIE['password'];  ?>   </b>     </td></tr> 
                      
                      <tr><td style="padding:10px">User Type:   </td><td> <b> <?php echo $_COOKIE['userType'];  ?>   </b>     </td></tr>  
 

                       </table>
                       </td>
                    </tr>
                                
                                 
                               

                                 

                                 
                                
                                

                                

                                <tr>
                                    <td colspan="2"><hr></td>
                                </tr>

                                <tr align="center">
                                    <td colspan="2" ><a href="logOut.php"><p  style="color:red; font-size:20px;"><b>Log Out<b></p></a></td>
                                </tr>
                                 
                            </table>
                        </td>
                    </tr>
                </table>
            </fieldset>
         
    </body>
    </html>