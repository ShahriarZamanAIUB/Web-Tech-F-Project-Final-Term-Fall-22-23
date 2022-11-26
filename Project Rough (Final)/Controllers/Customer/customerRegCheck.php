<?php
     session_start();
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $retypedPassword = trim($_POST['retypedPassword']);

    $userType= 'customer';

    $address = trim($_POST['address']);
    $balance = 20000;
    $already_exists_flag;
   // $record;
    $record_elements;
     

    if($username == "" || $password == "" || $email == "" ||$retypedPassword==""||$address==""){
        //echo "Null values"; 
        
        header('location: customerRegistration.php?err=null');

        
    }

    else if(substr_count($username,'|')>0|| substr_count($password,'|')>0 || substr_count($retypedPassword,'|')>0|| substr_count($address,'|')>0)
    {
        header('location: customerRegistration.php?err=|_instance');
 
    }

    else if((substr_count($username,'@')>0)||(substr_count($username,'#')>0)||(substr_count($username,'$')>0)||(substr_count($username,'%')>0))
	{
        header('location: customerRegistration.php?err=spchr_instance');
    }

    else if(strlen($password)<8){
        header('location: customerRegistration.php?err=password_too_short');
    }

    else if((substr_count($password,'@')<1)&&(substr_count($password,'#')<1)&&(substr_count($password,'$')<1)&&(substr_count($password,'%')<1)){
        header('location: customerRegistration.php?err=password_lacks_spchr');
    }

   
    
    else if($password!=$retypedPassword){
     
      // echo "Passwords do not match!";

      header('location: customerRegistration.php?err=passwords_unmatched');

    }
    
    else{ 
              $already_exists_flag=false;
         
        
                 

               
                $con = mysqli_connect('localhost', 'root', '', 'web_tech_final_project');
                $sql = "select * from allUsers where username='{$username}' and email='{$email}'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
        
                if($count >= 1){
                   // setcookie('status', 'true', time()+3600, '/');
                   // header('location: home.php');
                   $already_exists_flag=true;

                } 



        

        if($already_exists_flag==true)
        {


            header('location: customerRegistration.php?err=already_taken');


        }



        else{

              


        
            $con = mysqli_connect('localhost', 'root', '', 'web_tech_final_project');
            $sql = "insert into allUsers values('{$username}', '{$password}', '{$email}' , '{$address}' , '{$balance}')";
            $status = mysqli_query($con, $sql);
            
            if($status){
                setcookie('status', 'true', time()+60*60*72, '/');

                setcookie('username', $username, time()+60*60*72, '/');
        
                setcookie('password', $password, time()+60*60*72, '/');
        
                setcookie('email', $email, time()+60*60*72, '/');
        
                setcookie('userType', $userType, time()+60*60*72, '/');
        
                setcookie('address', $address, time()+60*60*72, '/');       
        
                setcookie('balance', $balance, time()+60*60*72, '/');
        
        
                
        
                header('location: customerDashboard.php?message=reg_success');
            }
            
            else{
                header('location: customerRegistration.php?err=database_error');
            }

         

         

       
        }
    }

?>