<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

?>



<html>
    <head>
        <title>Owner Adding Food Items</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="800px"  border="1">
                    <tr><td align="center" height="40px"><h1>Add Food Items <p style="color:green"> <?php echo "(".$_COOKIE['restaurantName'].")"; ?>  </h1></td></tr>
                    <tr><td><hr></td></tr>

                   <?php
                        if(isset($_GET['message']))
                        {
                           /* if($_GET['message'] == 'reg_success'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Welcome to your new account!<b></p></td></tr>';  
                            }*/
 

                             

                            
  
                        } 


                        if(isset($_GET['err']))
                        {
                             if($_GET['err'] == 'null'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Please Input The Fields Properly!<b></p></td></tr>';  
                            }

                            else if($_GET['err'] == '|_instance'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Name cannot contain certain special characters!<b></p></td></tr>';  
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

                        


                        <td>
                        <table border="1" align="center">
                            
                        

                         
                        
                        
                      <form method="post" action="restaurantOwnerAddingFoodItemsCheck.php" enctype="" >  
                      
                     <tr> <td colspan="2" align="center"><h2><p  style="color:brown"> Enter Info of The New Food Item     </p><h2>  </td></tr>
                     <tr> <td colspan="2"> <hr>  </td></tr>

                   




                      <tr><td style="padding:10px">Food Item Name:  </td><td>     <input style="width: 200px; height: 30px;" type="text"     name="foodItemName"          value=""       placeholder="Food Item Name">  </td></tr> 
                      <tr><td style="padding:10px">Price (Tk.):     </td><td>     <input style="width: 200px; height: 30px;" type="number"   name="foodItemPrice"       value="100" placeholder="Food Item Price" min="1"> </td> </tr>
 
                     
                      <tr><td align="center" colspan="2" style="padding:10px"> <input type="submit" name="" value="Register"> &nbsp <input type="reset" name="" value="Reset"> </td></tr>
                      </form>
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