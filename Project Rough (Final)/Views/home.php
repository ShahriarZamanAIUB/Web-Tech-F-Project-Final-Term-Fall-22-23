<?php

session_start();

if(isset($_COOKIE['status'])){


     if(isset($_COOKIE['userType'])){
         if($_COOKIE['userType']=='customer')
        {header('location: Customer/customerDashboard.php?');}

        else if($_COOKIE['userType']=='admin')
        {header('location: Admin/adminDashboard.php?');}

        else if($_COOKIE['userType']=='restaurantOwner')
        {header('location: RestaurantOwner/restaurantOwnerDashboard.php?');}

        else if($_COOKIE['userType']=='restaurantManager')
        {header('location: RestaurantManager/restaurantManagerDashboard.php?');}
     }
}

?>





<html>
    <head>
        <title>Food Court Management System</title>
    </head>
    <body>
        <form method="post" action="../Controllers/loginCheck.php" enctype="">
            <fieldset  >
                <legend><p  style="font-size:20px;">Welcome To Food Court Management System</p></legend>
                <table align="center" height="700px" width="700px" border="1">
                    <tr><td align="center"><h1>Welcome To Food Court Management System</h1></td></tr>
                    <tr><td><hr></td></tr>

                    <?php
                        if(isset($_GET['err']))
                        {
                            if($_GET['err'] == 'null'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Error: Input the fields properly!<b></p></td></tr>';  
                            }

                            else if($_GET['err'] == 'login_failed'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Error: Invalid Username/Password, Try Again!<b></p></td></tr>';  
                            }

                             

                            else if($_GET['err'] == '|_instance'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Error: | characters not allowed!<b></p></td></tr>';  
                            }

                            
  
                        } 

                        else if(isset($_GET['message']))
                        {
                            if($_GET['message'] == 'log_out_success'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Logged Out!<b></p></td></tr>';  
                            }
   
  
                        } 
                      ?>


                    <tr>
                        <td>
                            <table align="center" border="1" width="400px" height="400px" >
                                <tr  >
                                   <td colspan="2" >  <p  style="font-size:20px;"><b>Please Select User Type:  </b> </p></td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <input type="radio" name="userType" value="admin">
                                    </td>
                                    <td>
                                        <b>Admin</b>
                                    </td>
                                </tr>
                                
                                 
                                
                                 
                                
                                <tr>
                                    <td align="center">
                                        <input type="radio" name="userType" value="restaurantOwner"   >
                                    </td>
                                    <td>
                                        <b>Restaurant Owner</b>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="center">
                                        <input type="radio" name="userType" value="customer"   checked >
                                    </td>
                                    <td>
                                        <b>Customer</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2"><hr></td>
                                </tr>
                                
                                <tr>
                                    <td align="center">
                                        <b>Username:</b>
                                    </td>
                                    <td>
                                        <input style="height: 30px;" type="text" name="username" value="" placeholder="Username">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="center">
                                        <b>Password:</b>
                                    </td>
                                    <td>
                                        <input style="height: 30px;" type="password" name="password" value="" placeholder="Password">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2"><hr></td>
                                </tr>

                                <tr>
                                     
                                    <td colspan="2" align="center">
                                        <input type="submit" name="" value="Login">&nbsp&nbsp&nbsp
                                        <input type="reset" name="" value="Reset">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2"><hr></td>
                                </tr>

                                 
                                <tr align="center">
                                    <td colspan="2"><a href="customerRegistration.php"><b>Customer Registration</b></a></td>
                                </tr>

                                <tr>
                                    <td colspan="2"><hr></td>
                                </tr>

                                <tr align="center">
                                    <td colspan="2"><a href="aboutUs.php"><b>About Us</b></a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </body>
    </html>