<?php
error_reporting(0);

session_start();

if(!isset($_COOKIE['status'])){header('location: home.php?err=bad_request');}


if(isset($_POST['restaurantName']))
{$restaurantName=$_POST['restaurantName'];

     setcookie('restaurantName',$_POST['restaurantName'],time()+60*60,'/');
}

else if(isset($_COOKIE['restaurantName']))
{

    $restaurantName=$_COOKIE['restaurantName'];
}

else
{header('location: customerChoosingRestaurant.php?err=restaurant_not_selected');}
 



    echo "<html><head><title>Customer Dashboard</title></head><body>";
        
    echo "<fieldset>";
    echo "<legend><p  style='font-size:20px;'>Food Court Management System</p></legend>";
    echo "<table align='center' height='700px' width='700px'  border='1'>";
    echo "<tr><td align='center' style='background-color:#FFFFE0;'><h1>Choose a Food Item</h1></td></tr> ";
    echo "<tr><td style='background-color:#FFFFE0;'><hr></td></tr>";

                    
                        if(isset($_GET['message']))
                        {
                             

                            
  
                        } 


                        else if(isset($_GET['err']))
                        {
                            if($_GET['err'] == 'none_selected'){
                                echo '<tr><td align="center" style="background-color:#FFFFE0;"><p  style="color:red; font-size:20px;"><b> You Must Select The Food Items Properly To Proceed!<b></p></td></tr>';  
                            }

                            else if($_GET['err'] == 'quantity_not_set'){
                                echo '<tr><td align="center" style="background-color:#FFFFE0;"><p  style="color:red; font-size:20px;"><b> You Must Set Quantity!<b></p></td></tr>';  
                            }

                            else if($_GET['err'] == 'try_again'){
                                echo '<tr><td align="center" style="background-color:#FFFFE0;"><p  style="color:red; font-size:20px;"><b> Set Up The Values Properly!<b></p></td></tr>';  
                            }
  
                        } 
                       

                     

                        echo "<tr><td><table align='center' border='1' width='100%' height='100%'  style='background-color:#E8F8F5;'>";
                        
                                
                                 
                        echo "<tr>";
                        echo "<td width='30%'>";
                        echo "<ul style='line-height:250%'>";

                        echo "<li><a href='customerDashboard.php'>Dashboard</a><br></li>";
                        echo "<li><a href='customerChoosingRestaurant.php'>Place Order</a><br></li>";
                        echo "<li><a href='viewProfile.php'>View Profile</a></li>";
                     //   echo "<li><a href='editProfile.php'>Edit Profile</a></li>";
                     
                        echo " <li><a href='logOut.php'>LogOut</a></li>";

                        echo "</ul>";
 
                        echo "</td>";

                        


                        echo "<td align='center'>";
                        echo "<form method='post' action='customerConfirmingOrder.php' enctype=''>";
                        echo "<table border='1' width='100%' style='background-color:#FFFFE0;'>";
                        echo "<tr><td align='center'><h3>Select<h3></td>";
                        echo "<td align='center'><h3>Food Name<h3></td>";
                        echo "<td align='center'><h3>Food Image<h3></td>";
                        echo "<td align='center'><h3>Food Price<h3></td>";
                        echo "<td align='center'><h3>Select Quantity<h3></td>";
                        echo "</tr>";
                         
                           
                           $i=0;
                        $file=fopen('allFoods/'.$restaurantName.'/allFoodNames.txt','r');

                        if (filesize('allFoods/'.$restaurantName.'/allFoodNames.txt') == 0){header('location: customerChoosingRestaurant.php?err=food_menu_file_empty');}

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
            
                                 if(file_exists('allFoods/'.$restaurantName."/".$foodName.'.jpg'))
                                 {
                                     echo "<td align='center' ><img src='allFoods/".$restaurantName."/".$foodName.".jpg' width='80px' height='80px'></td> ";
                 
                                 }

                                else{
                                         echo "<td align='center' ><img src='Blank.jpg' width='80px' height='80px'></img></td> "; 
                 
                                    }
            
                                 echo "<td align='center'>".$foodPrice."</td> ";

                                 echo "<td align='center'><input type='number' name='selected_quantity".$i."' value='0' min='0' style='width:50px'></td></tr>";
                                 setcookie('food_price'.strval($i),$foodPrice,time()+60*10,'/');

                                 $i=$i+1;
                             }       


        }
            fclose($file); $_SESSION['customerChoosingFoodItems.php']['i']=$i;

        echo "<tr><td align='center' colspan='5' > <input type='submit' name='' value='Proceed'> &nbsp <input type='reset' name='' value='Reset'> </td></tr>"; 

         
        
        echo "</table></form></td></tr><tr><td colspan='2'><hr></td></tr><tr align='center'>";

        echo "<td colspan='2' style='background-color:#FFFFE0;><a href='logOut.php'><p  style='color:red; font-size:20px;'><b>Log Out<b></p></a></td>";
        echo " </tr>";
                                 
        echo " </table>";
        echo "  </td>";
        echo "  </tr>";
        echo " </table>";
        echo " </fieldset>";
         
        echo "</body>";
        echo "</html>";
    ?>    