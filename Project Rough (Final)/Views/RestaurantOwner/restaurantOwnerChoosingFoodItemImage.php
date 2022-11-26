<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

?>



<html>
    <head>
        <title>Owner Setting Food Item Image</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="800px"  border="1">
                    <tr><td align="center"><h1>Add Image of this Food Item <p  style="color:green;"> <?php echo "(".$_COOKIE['restaurantName'].")"; ?> </p></h1></td></tr>
                    <tr><td><hr></td></tr>

                   <?php
                        if(isset($_GET['message']))
                        {
                             if($_GET['message'] == 'food_item_added'){
                                echo '<tr><td align="center"><p  style="color:blue; font-size:20px;"><b>Food Item Added Successfully!<b></p></td></tr>';  
                            } 
 

                             

                            
  
                        } 


                        if(isset($_GET['err']))
                        {
                            /*if($_GET['err'] == 'null'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Please Input All The Fields Properly!<b></p></td></tr>';  
                            }

                            else if($_GET['err'] == 'already_taken'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Restaurant/Owner Already Registered!<b></p></td></tr>';  
                            }*/
   
  
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
                            <tr><td align="center" colspan="2">
                        
                        <?php
                        if ( isset($_COOKIE['restaurantName']) && isset($_COOKIE['foodItemName']))
                                    {  
                                        $restaurantName=$_COOKIE['restaurantName'];

                                        $foodItemName=$_COOKIE['foodItemName'];
                                        
                                        
                                        
                                        
                                        if(file_exists("allFoods/".$restaurantName."/".$foodItemName.".jpg"))
                                                      {echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="allFoods/'.$restaurantName.'/'.$foodItemName.'.jpg?t='.time().'" height="150px" width="150px"></img><br><br>';} 
                            
                                      else{            echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="Blank.jpg" height="120px" width="120px"></img><br><br>';    }
                                    }

                                 else{echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="Blank.jpg" height="120px" width="120px"></img><br><br>';}   

                        ?>  
                      

                      <form method="post" action="foodItemImageUploadCheck.php" enctype="multipart/form-data" >  
                      
                      Change Food Item Image: <br><br>&nbsp <input type="file" name="myfile" value="" /><br><br>
                          <input type="submit" name="submit" value="Set_Image"/>
                        </form>
                     </td></tr>
                     
                    <?php
                     echo "<tr><td align='center'>Item Name:</td><td align='center'>".$_COOKIE['foodItemName']."</td></tr>";
                     echo "<tr><td align='center'>Item Price:</td><td align='center'> Tk. ".$_COOKIE['foodItemPrice']."</td></tr>";
                     echo "<tr><td align='center'>Restaurant Name:</td><td align='center'>".$_COOKIE['restaurantName']."</td></tr>";
                     ?>
                      
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