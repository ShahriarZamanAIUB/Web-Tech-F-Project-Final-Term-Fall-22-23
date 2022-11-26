<?php
     session_start();
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
    $email = $_COOKIE['email'];

    $address=$_COOKIE['address'];

    $balance=$_COOKIE['balance'];

     

    $totalPriceWithVAT=$_COOKIE['totalPriceWithVAT'];
    
    $new_balance=$balance-$totalPriceWithVAT;

      
    
       
  

      $user_record=$username."|".$password."|".$email."|".$address."|".$balance;

      $updated_user_record=$username."|".$password."|".$email."|".$address."|".$new_balance;

     // echo  $updated_user_record;
     // echo  '-------------------';

      //echo $_COOKIE['restaurantName'];


         
        
        $i=0;$j=0;

         $file =fopen('allCustomers.txt','r');
         while(!feof($file))
        {   
            $record=trim(fgets($file));
            
            $allRecords[$i]=$record;

            if($user_record==$record)
            {
                $found=true;
                //echo "Helll yoooh".$i;
                 break;

            }

           $i=$i+1;


        }   

        while($j<=$i)
        {
          
            if($allRecords[$j]==$user_record)
            { $allRecords[$j]=$updated_user_record;
               break;}

            $j=$j+1;

        }

        fclose($file);
        $i=0;
        $file =fopen('allCustomers.txt','w');
        while($i<=$j)
        {
             fwrite($file,  $allRecords[$i]."\r\n"); 
           $i=$i+1;
        }
            
       // $_SESSION['user']['username']=$new_username ;
        //$_SESSION['user']['password']=$new_password;
        //$_SESSION['user']['email']=$new_email;

         

        fclose($file);

          

        header('location: customerDashboard.php');

       
         
     

?>