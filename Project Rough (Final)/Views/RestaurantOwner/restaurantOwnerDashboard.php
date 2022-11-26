<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

?>



<html>
    <head>
        <title>Restaurant Owner Dashboard</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="800px"  border="1">
                    <tr><td align="center"><h1>Restaurant Owner Dashboard <p  style="color:green;"> <?php echo '('.$_COOKIE["restaurantName"].')'; ?></p> </h1></td></tr>
                    <tr><td><hr></td></tr>

                   <?php
                        if(isset($_GET['message']))
                        { 
                            
                            if($_GET['message'] == 'log_in_success'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Welcome to your account, '.$_COOKIE['username'].'!<b></p></td></tr>';  
                            }

                            else if($_GET['message'] == 'restaurant_pic_set_successfully'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Restaurant Picture Changed Successfully!<b></p></td></tr>';  
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

                        


                        <td align="center">
                        <table border="1">    
                      <tr><td colspan="2" align="center"> 
                        <?php  if(isset($_COOKIE['username']))
                                    {   if(file_exists("restaurantDP/".$_COOKIE['restaurantName'].".jpg"))
                                                      {echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="restaurantDP/'.trim($_COOKIE['restaurantName']).'.jpg?t='.time().'" height="120px" width="120px"></img><br><br>';} 
                            
                                      else{            echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="Blank.jpg" height="120px" width="120px"></img><br><br>';    }
                                    }

                                 else{echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="Blank.jpg" height="120px" width="120px"></img><br><br>';}   
                        
                        ?> 
                         </td></tr>

                         <tr> <td align="center" colspan="2"> 
                        <form method="POST" action="restaurantDPUploadCheck.php" enctype="multipart/form-data" >
                                Change Restaurant Picture:  <input type="file" name="myfile" value="" /><br><br>
                          <input type="submit" name="submit" value="Update"/>
                        </form>
                     </td></tr>

                     <tr> <td colspan="2"> <hr>  </td></tr>

                      <tr><td style="padding:10px">Restaurant Name:</td><td><b> <?php echo $_COOKIE["restaurantName"]; ?></b></td> </tr>
                      <tr><td style="padding:10px">Owner Name:</td><td><b>  <?php echo $_COOKIE["username"]; ?></b></td></tr> 
                      <tr><td style="padding:10px">Restaurant Balance:</td><td><b>   Tk. <?php echo $_COOKIE["restaurantBalance"]; ?></b> </td></tr>
                     
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