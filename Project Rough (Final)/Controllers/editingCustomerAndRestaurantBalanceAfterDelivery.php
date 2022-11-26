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

       //echo  $updated_user_record;
       //echo  '-------------------';

       //echo $_COOKIE['restaurantName'];


          
        
        $i=0;$j=0;

        $x=0;
        echo "<html><body><table border='1'>";
         $file =fopen('allCustomers.txt','r');
         while(!feof($file))
        {   
            $record=trim(fgets($file));
            
            $allRecords[$i]=$record;

            echo "<tr><td>".$allRecords[$i]."</td></tr>";

            if($user_record==$record)
            {
                $found=true;
                //echo "Helll yoooh".$i;

                $x=$i;
               //  break;

            }

           $i=$i+1;


        }   
        echo "</table></body></html>";
       // while($j<=$i)
       // {
          
           // if($allRecords[$j]==$user_record)
          //  { 
              //$allRecords[$j]=$updated_user_record;

              $allRecords[$x]=$updated_user_record;
             //  break;}

         //   $j=$j+1;

       // } 
       
       echo "<html><body><table border='1'>";

        fclose($file);
        $j=0;
        $file =fopen('allCustomers.txt','w');
        while($j<$i)
        {
             fwrite($file,  $allRecords[$j]."\r\n"); 

            echo "<tr><td>".$allRecords[$j]."</td></tr>";
           $j=$j+1;
        }

        echo "</table></body></html>";
            
       // $_SESSION['user']['username']=$new_username ;
       // $_SESSION['user']['password']=$new_password;
       // $_SESSION['user']['email']=$new_email;

       $j=0;$i=0;

        fclose($file);

         
        $AllRestaurantRecords;

        $i=0;

        $i_at=0;

        $File=fopen('allRestaurantOwners.txt','r');

        while(!feof($File))
        {
            $AllRestaurantRecords[$i]=trim(fgets($File));

            $AllRestaurantRecords_List=explode('|',$AllRestaurantRecords[$i]);

            
            if(isset($AllRestaurantRecords_List[3])){
            if($AllRestaurantRecords_List[3]==$_COOKIE['restaurantName'])
              {
                $i_at=$i;
                $foundRecord=$AllRestaurantRecords[$i];


              }

            $i=$i+1;
          
            }
        }


        if(isset($foundRecord))
        {
            $foundRecordItems=explode('|',$foundRecord);

             

            if(isset($foundRecordItems[5]))
            {
             
                $foundRecordItems[5]=$foundRecordItems[5]+$totalPriceWithVAT;

                $foundRecord=$foundRecordItems[0].'|'.$foundRecordItems[1].'|'.$foundRecordItems[2].'|'.$foundRecordItems[3].'|'.$foundRecordItems[4].'|'.$foundRecordItems[5];
                

                $AllRestaurantRecords[$i_at]=$foundRecord;
                 //echo $AllRestaurantRecords[$i_at];
            }

            fclose($File);
            
            $j=0;
            $FILE=fopen('allRestaurantOwners.txt','w');
             
              while($j<$i)
              {

             
                fwrite($FILE,  $AllRestaurantRecords[$j]."\r\n"); 


               $j=$j+1; 
              }



            fclose($FILE);


            setcookie('orderApproved',true,time()-100,'/');

            setcookie('balance',$new_balance,time()+60*60*24,'/');

             header('location: customerDashboard.php?message=all_done');

        }

         

       
         
     

?>