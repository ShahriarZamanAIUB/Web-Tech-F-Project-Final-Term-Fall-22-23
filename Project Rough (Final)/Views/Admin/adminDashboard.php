<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

$count=0;

$file=fopen('allRestaurantOwners.txt','r');
 

while(!feof($file))
{  
   $record=trim(fgets($file));
   $count=$count+1;
 

}

fclose($file);


$current_vat_rate=0;

$file=fopen('VAT.txt','r');
 

while(!feof($file))
{  
    $current_vat_rate=trim(fgets($file));
    
 

}

//setcookie('current_vat_rate',$current_vat_rate,time()+60*60,'/');

fclose($file);



$adminBalance=0;


$FILE=fopen('allOrders.txt','r');
 

while(!feof($FILE))
{  
   $RECORD=trim(fgets($FILE));
   $RECORD_ELEMENTS=explode('|',$RECORD);

   //echo $RECORD;
   if(isset($RECORD_ELEMENTS[2])) 
   {if($RECORD_ELEMENTS[2]=='complete')
   {
       for($i=8; $i<=count($RECORD_ELEMENTS)-1; $i=$i+4 )
       {
        $adminBalance=$adminBalance+$RECORD_ELEMENTS[$i];

       }

      // $adminBalance=$adminBalance*$current_vat_rate/100;

       //echo $adminBalance.'---';


   }}
 

}

$adminBalance=round($adminBalance*$current_vat_rate/100);

//echo $adminBalance.'---';

$i=0;

?>



<html>
    <head>
        <title>Admin Dashboard</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="700px"  border="1">
                    <tr><td align="center"><h1>Admin Dashboard</h1></td></tr>
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

                            else if($_GET['message'] == 'restaurant_added'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Restaurant Added Successfully!<b></p></td></tr>';  
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

                        


                        <td align="center">
                        <table border="1"  >    
                      <tr><td colspan="2" align="center"> 
                        <?php  if(isset($_COOKIE['username']))
                                    {   if(file_exists("adminDP/".$_COOKIE['username'].".jpg"))
                                                      {echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="adminDP/'.trim($_COOKIE['username']).'.jpg?t='.time().'" height="120px" width="120px"></img><br><br>';} 
                            
                                      else{            echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="default_dp.jpg" height="120px" width="120px"></img><br><br>';    }
                                    }

                                 else{echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="default_dp.jpg" height="120px" width="120px"></img><br><br>';}   
                        
                        ?> 
                         </td></tr>

                         <tr> <td align="center" colspan="2"> 
                        <form method="POST" action="adminDPUploadCheck.php" enctype="multipart/form-data" >
                                Change Profile Picture:  <input type="file" name="myfile" value="" />
                        <br>  <br>     <input type="submit" name="submit" value="Update"/>
                        </form>
                     </td></tr>

                     <tr> <td colspan="2"> <hr>  </td></tr>


                      <tr><td style="padding:10px">Username: </td><td align="center"><b><?php echo $_COOKIE["username"]; ?></b></td></tr> 
                      <tr><td style="padding:10px">Restaurants:</td><td align="center"><b> <?php echo $count; ?></b> </td> </tr>
                      <tr><td style="padding:10px">Balance:</td><td align="center"><b> <?php echo ' Tk. '.$adminBalance; ?></b> </td> </tr>


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