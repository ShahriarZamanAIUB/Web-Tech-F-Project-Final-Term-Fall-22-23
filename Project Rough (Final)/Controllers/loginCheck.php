<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    $loginStatus=false;

    if($username == "" || $password == "" || $userType==""){
        header('location: ../Views/home.php?err=null');
    } 

    else if(substr_count($username,'|')>0|| substr_count($password,'|')>0){
        header('location: ../Views/home.php?err=|_instance');
    }

    else
    {  $filename;
        $php_filename;
        $db_table_name;
        
        switch ($userType) {

         case 'admin':
            $db_table_name='allAdmins';  $php_filename='../Views/Admin/adminDashboard.php';
          break;

        case 'foodCourtManager':
            $db_table_name='allFoodCourtManagers';  $php_filename='../Views/FoodCourtManager/foodCourtManagerDashboard.php';
          break;

        case 'restaurantManager':
            $db_table_name='allRestaurantManagers'; $php_filename='../Views/RestaurantManager/restaurantManagerDashboard.php';
          break;

        case  'restaurantOwner':
            $db_table_name='allRestaurantOwners';    $php_filename='../Views/RestaurantOwner/restaurantOwnerDashboard.php';
          break;

        case  'customer':
            $db_table_name='allUsers';          $php_filename='../Views/Customer/customerDashboard.php';
            break;
           
           
        default:
        header('location: ../Views/home.php?err=null');
      }





      $con = mysqli_connect('localhost', 'root', '', 'web_tech_final_project');
      $sql = "select * from ".$db_table_name." where username='{$username}' and password='{$password}'";
      $result = mysqli_query($con, $sql);
      $count = mysqli_num_rows($result);

      if($count == 1){
        $loginStatus=true;

       
        
        while($row = mysqli_fetch_array($result)) {
         
          $username=$row["userName"];  
          $password=$row["password"]; 
          $email=$row["email"];   
          $address=$row["address"];
          $balance=$row["balance"];    
           
         
        
      }
    }
      
      else{
          header('location: ../Views/login.php?err=invalid');
      }




         

        if($loginStatus==true)
        { 
             

             
            setcookie('status', 'true', time()+60*60*72, '/');

            setcookie('username', $username, time()+60*60*72, '/');

            setcookie('password', $password, time()+60*60*72, '/');

            setcookie('email', $email, time()+60*60*72, '/');

            setcookie('userType', $userType, time()+60*60*72, '/');

            if($userType=='customer')
            {
                setcookie('address', $address, time()+60*60*72, '/');

                setcookie('balance', $balance, time()+60*60*72, '/');


            }

            else if($userType=='restaurantOwner')
           { setcookie('restaurantName', trim($record_elements[3]), time()+60*60*72, '/');

            setcookie('restaurantAddress', trim($record_elements[4]), time()+60*60*72, '/');

            setcookie('restaurantBalance', trim($record_elements[5]), time()+60*60*72, '/');

           }
            
           //$_SESSION['user']['selectedUserType']=$userType;

            header('location: '.$php_filename.'?message=log_in_success');
           
             
        }

        else
        {
            header('location: ../Views/home.php?err=login_failed');

        }





    }

?>