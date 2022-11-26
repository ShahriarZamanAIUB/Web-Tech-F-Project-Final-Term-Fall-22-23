<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

/*$count=0;

$file=fopen('allRestaurantOwners.txt','r');
 

while(!feof($file))
{  
   $record=trim(fgets($file));
   $count=$count+1;
 

}

fclose($file); */

?>



<html>
    <head>
        <title>Admin Editing Profile</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="700px"  border="1">
                    <tr><td align="center"><h1>Admin Profile Editing</h1></td></tr>
                    <tr><td><hr></td></tr>

                   <?php
                        if(isset($_GET['message']))
                        {
                           if($_GET['message'] == 'edit_published'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Account Editing Successful for '.$_COOKIE['username'].'!<b></p></td></tr>';  
                            }

                              

                            
  
                        } 

                        else if(isset($_GET['err']))
                        {
                           if($_GET['err'] == 'null'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Fill Up The Fields Properly!<b></p></td></tr>';  
                            }
   
  
                        } 
                      ?>

                     

                    <tr>
                        <td>
                            <table align="center" border="1" width="100%" height="100%"  >
                        
                                
                                 
                                <tr>
                                <td width="30%">
                      <ul style="line-height:250%">

                      <li><b><a href="adminDashboard.php">Dashboard</a><br></li>
                     <li><a href="adminAddingRestaurants.php">Add Restaurant</a><br></li>
                     <li><a href="adminViewingRestaurants.php">View Restaurants</a><br></li>
                     <li><a href="adminViewingProfile.php">View Profile</a></li>
                     <li><a href="adminEditingProfile.php">Edit Profile</a></li>
                     
                     <li><a href="logOut.php">LogOut</a></b></li>

                    </ul>
 
                        </td>

                        <td >
                        <table border="1" align="center">    
                      

                      <form method="post" action="adminEditingProfileCheck.php" enctype="" >  
                      
                     <tr> <td colspan="2" align="center"><h2> Edit Your Information:  <h2>  </td></tr>
                     <tr> <td colspan="2"> <hr>  </td></tr>

                   




                      <tr><td style="padding:10px"><b>Username:  </b></td><td><input style="width: 150px; height: 30px;" type="text"     name="new_username"       value=<?php echo $_COOKIE['username']; ?>       placeholder='Admin Username'  </td></tr> 
                      <tr><td style="padding:10px"><b>E-mail: </b></td><td><input style="width: 150px; height: 30px;" type="text"     name="new_email"       value=<?php echo $_COOKIE['email']; ?>       placeholder="Admin E-mail"> </td> </tr>
                      <tr><td style="padding:10px"><b>Password: </b></td><td><input style="width: 150px; height: 30px;" type="text"     name="new_password"       value=<?php echo $_COOKIE['password']; ?>       placeholder="Admin Password"> </td> </tr>

                      <tr><td  colspan="2">  <hr>    </td> </tr>
 
                     
                      <tr><td align="center" colspan="2" style="padding:10px"> <input type="submit" name="" value="Set Changes"> &nbsp <input type="reset" name="" value="Reset"> </td></tr>
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