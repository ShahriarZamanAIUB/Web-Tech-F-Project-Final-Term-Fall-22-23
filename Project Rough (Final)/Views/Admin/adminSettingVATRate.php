<?php

session_start();

 

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}
 

 $current_vat_rate=0;

$file=fopen('VAT.txt','r');
 

while(!feof($file))
{  
    $current_vat_rate=trim(fgets($file));
    
 

}

setcookie('current_vat_rate',$current_vat_rate,time()+60*60,'/');

fclose($file);

?>



<html>
    <head>
        <title>Admin Setting VAT</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="700px"  border="1">
                    <tr><td align="center"><h1>Set VAT for all Restaurants <p style="color:green">(Admin)</p></h1></td></tr>
                    <tr><td><hr></td></tr>

                   <?php
                        if(isset($_GET['message']))
                        {
                           if($_GET['message'] == 'vat_rate_updated'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>VAT updated successfully!<b></p></td></tr>';  
                            }

                             

                              

                            
  
                        } 

                        if(isset($_GET['err']))
                        {
                           if($_GET['err'] == 'vat_rate_update_failed'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>VAT update Failed!<b></p></td></tr>';  
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
                     <li><a href="adminSettingVATRate.php">Set VAT rate</a><br></li>
                     <li><a href="adminViewingProfile.php">View Profile</a></li>
                     <li><a href="adminEditingProfile.php">Edit Profile</a></li>
                     
                     <li><a href="logOut.php">LogOut</a></b></li>

                    </ul>
 
                        </td>

                        


                        <td >

                        <table border="1" align="center">    
                      

                      <form method="post" action="adminSettingVATRateCheck.php" enctype="" >  
                      
                     <tr> <td colspan="2" align="center"><h2> Enter The Value:  <h2>  </td></tr>
                     <tr> <td colspan="2"> <hr>  </td></tr>

                   




                      <tr><td style="padding:10px">Current Rate:  </td>  <th align="left" > <?php echo "$current_vat_rate"." (% Tax on Orders)" ?>  </th></tr> 
                      <tr><td style="padding:10px">Enter New Rate: </td><td><input style="width: 150px; height: 30px;" type="number"     name="new_vat_rate"       value=<?php echo $current_vat_rate; ?>       placeholder="% VAT"> </td> </tr>
                      <tr><td  colspan="2">  <hr>    </td> </tr>
 
                     
                      <tr><td align="center" colspan="2" style="padding:10px"> <input type="submit" name="" value="Set VAT"> &nbsp <input type="reset" name="" value="Reset"> </td></tr>
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