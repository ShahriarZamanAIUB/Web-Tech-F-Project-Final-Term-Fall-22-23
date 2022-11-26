<?php

session_start();

//if(!isset($_COOKIE['status'])){
//  header('location: home.php?err=bad_request');
//}

?>



<html>
    <head>
        <title>Customer Dashboard</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="700px"  border="1">
                    <tr><td align="center"><h1>Choose a Food Item</h1></td></tr>
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

                            
  
                        } 


                        else if(isset($_GET['err']))
                        {
                            if($_GET['err'] == 'none_selected'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b> You Must Select Any Food Item To Proceed!<b></p></td></tr>';  
                            }

                            else if($_GET['err'] == 'quantity_not_set'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b> You Must Set Quantity!<b></p></td></tr>';  
                            }

                            else if($_GET['err'] == 'try_again'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b> Set Up The Values Properly!<b></p></td></tr>';  
                            }
  
                        } 
                      ?>

                     

                    <tr>
                        <td  >
                            <table align="center" border="1" width="100%" height="100%"  >
                        
                                
                                 
                                <tr>
                                <td width="30%">
                      <ul style="line-height:250%">

                     <li><a href="customerDashboard.php">Dashboard</a><br></li>
                     <li><a href="customerChoosingRestaurant.php">Place Order</a><br></li>
                     <li><a href="viewProfile.php">View Profile</a></li>
                     <li><a href="editProfile.php">Edit Profile</a></li>
                     
                     <li><a href="logOut.php">LogOut</a></li>

                    </ul>
 
                        </td>

                        


                        <td align="center">
                        <form method="post" action="testCheck.php" enctype="">
                        <table border="1" width="100%">
                        <tr><td align="center"><h3>Select<h3></td>
                            <td align="center"><h3>Food Name<h3></td>
                            <td align="center"><h3>Food Image<h3></td>
                            <td align="center"><h3>Food Price<h3></td>
                            <td align="center"><h3>Select Quantity<h3></td>
                        </tr>
                        <?php
                           
                           $i=0;
                        $file=fopen('allFoods/allFoodNames.txt','r');

                        while(!feof($file))
                        {
                             $record=fgets($file);
            
            
                             $record_elements=explode("|",$record);

             

                            if(isset($record_elements[0]) && isset($record_elements[1]))
                            {
                                $foodName=trim($record_elements[0]);
                                $foodPrice=trim($record_elements[1]);  
                                
                                echo "<tr><td align='center' > <input type='radio' name='foodName".$i."' value='".$foodName."'  ></td> "; 
                                 echo " <td align='center'>".$foodName."</td>";
            
                                 if(file_exists('allFoods/'.$foodName.'.jpg'))
                                 {
                                     echo "<td align='center' ><img src='allFoods/".$foodName.".jpg' width='80px' height='80px'></td> ";
                 
                                 }

                                else{
                                         echo "<td align='center' ><img src='Blank.jpg' width='80px' height='80px'></img></td> "; 
                 
                                    }
            
                                 echo "<td align='center'>".$foodPrice."</td> ";

                                 echo "<td align='center'><input type='number' name='selected_quantity".$i."' value='0' style='width:50px'></td></tr>";
                                  
                             }      setcookie('food_price'.strval($i),$foodPrice,time()+60*10,'/');

                                     $i=$i+1;


        }
            fclose($file); $_SESSION['test.php']['i']=$i;

        echo "<tr><td align='center' colspan='4' > <input type='submit' name='' value='Proceed'> &nbsp <input type='reset' name='' value='Reset'> </td></tr>"; 

        ?> </table></form>
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