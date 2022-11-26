<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

 

?>



<html>
    <head>
        <title>Admin Viewing Restaurants</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="700px"  border="1">
                    <tr><td align="center"><h1>All the Restaurants Under You</h1></td></tr>
                    <tr><td><hr></td></tr>

                   <?php
                        if(isset($_GET['message']))
                        {
                           /* if($_GET['message'] == 'reg_success'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Welcome to your new account, '.$_COOKIE['username'].'!<b></p></td></tr>';  
                            }

                             

                            else if($_GET['message'] == 'restaurant_added'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Restaurant Added Successfully!<b></p></td></tr>';  
                            } */

                            
  
                        } 
                      ?>

                     

                    <tr>
                        <td>
                            <table align="center" border="1" width="100%" height="100%"  >
                        
                                
                                 
                                <tr>
                                <td width="30%">
                      <ul style="line-height:500%">

                      <li><b><a href="adminDashboard.php">Dashboard</a><br></li>
                     <li><a href="adminAddingRestaurants.php">Add Restaurant</a><br></li>
                     <li><a href="adminViewingRestaurants.php">View Restaurants</a><br></li>
                     <li><a href="adminSettingVATRate.php">Set VAT rate</a><br></li>
                     <li><a href="adminViewingProfile.php">View Profile</a></li>
                     <li><a href="adminEditingProfile.php">Edit Profile</a></li>
                     
                     <li><a href="logOut.php">LogOut</a></b></li>

                    </ul>
 
                        </td>

                        <td align="center">

                         

                          <?php
                             echo "<table border='1' width='100%'>";
                              $file=fopen('allRestaurantOwners.txt','r');
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
                             
                                
                               echo "<tr><th>Restaurant Name</th><th>Restaurant Address</th><th>Restaurant Logo/Image</th><th>Restaurant Owner</th><tr>";

                              $j=0;

                              while($j<$I)
                              { 
                                $allRestaurantItems=explode('|',$allRestaurants[$j]);
                                if(isset($allRestaurantItems[3]) && isset($allRestaurantItems[4]) && isset($allRestaurantItems[1]))
                                {echo "<tr><td align='center'>$allRestaurantItems[3]</td><td align='center'>$allRestaurantItems[4]</td>";
                                  echo "<td>";
                                    if(isset($allRestaurantItems[3]))
                                    {   if(file_exists("restaurantDP/".$allRestaurantItems[3].".jpg"))
                                                      {echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="restaurantDP/'.$allRestaurantItems[3].'.jpg?t='.time().'" height="70px" width="70px"></img><br><br>';} 
                            
                                      else{            echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="Blank.jpg" height="70px" width="70px"></img><br><br>';    }
                                    }

                                 else{echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="Blank.jpg" height="70px" width="70px"></img><br><br>';}   
                                
                                 echo "</td><td align='center'>$allRestaurantItems[0]</tr>";
                                }
                                

                                $j++;
                              }

                            }




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