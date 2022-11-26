<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

?>



<html>
    <head>
        <title>Restaurant Owner Viewing Menu</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="800px"  border="1">
                    <tr><td align="center"><h1>Menu of this Restaurant <p  style="color:green;"> <?php echo '('.$_COOKIE["restaurantName"].')'; ?></p> </h1></td></tr>
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
                         
                        <?php
                             echo "<table border='1' width='100%'>";
                              $file=fopen('allFoods/'.$_COOKIE['restaurantName'].'/allFoodNames.txt','r');
                              $allRestaurants;
                              $I=0;
                              while(!feof($file))
                              { $record=trim(fgets($file));

                                 //echo $record;

                                 $allRestaurants[$I]=$record;

                                  //echo $allRestaurants[$I];

                                 $I++;


                              }

                              if($I==1){echo "<tr><td height='100%' align='center'><b><p style='color:red'>No Restaurant has been Registered Yet!</p><b></td></tr>";}

                              else{
                             
                                
                               echo "<tr><th>Food Item Name</th><th>Food Item Image</th><th>Price(Unit)</th><tr>";

                              $j=0;

                              while($j<$I)
                              { 
                                $allRestaurantItems=explode('|',$allRestaurants[$j]);
                                if(isset($allRestaurantItems[0]) && isset($allRestaurantItems[1]))
                                {echo "<tr><td align='center'>$allRestaurantItems[0]</td>";
                                  echo "<td align='center'>";
                                    if(isset($allRestaurantItems[0]))
                                    {   if(file_exists('allFoods/'.$_COOKIE['restaurantName'].'/'.$allRestaurantItems[0].".jpg"))
                                                      {echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="allFoods/'.$_COOKIE['restaurantName'].'/'.$allRestaurantItems[0].'.jpg?t='.time().'" height="70px" width="70px"></img><br><br>';} 
                            
                                      else{            echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="Blank.jpg" height="70px" width="70px"></img><br><br>';    }
                                    }

                                 else{echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="Blank.jpg" height="70px" width="70px"></img><br><br>';}   
                                
                                 echo "</td><td align='center'> Tk. ".$allRestaurantItems[1]."</tr>";
                                }
                                

                                $j++;
                              }

                            }




                         ?>
                       </td>
                    </tr>
                                
                                 
                               

                                 

                                 
                                
                                

                                

                                <tr>
                                    <td colspan="3"><hr></td>
                                </tr>

                                <tr align="center">
                                    <td colspan="3"><a href="logOut.php"><p  style="color:red; font-size:20px;"><b>Log Out<b></p></a></td>
                                </tr>
                                 
                            </table>
                        </td>
                    </tr>
                </table>
            </fieldset>
         
    </body>
    </html>