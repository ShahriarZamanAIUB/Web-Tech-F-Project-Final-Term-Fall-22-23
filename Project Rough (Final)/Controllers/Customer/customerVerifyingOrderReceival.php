<?php

$decision=$_POST['decision'];

$found=false;

$record_elements;

$new_record='';

$position_to_update=0;

$AllLines;

$I=0;

if(isset($_POST['selectedOrder']))
{  
     
    $record_line_no=$_POST['selectedOrder'];

    $File=fopen('allOrders.txt','r');

    while(!feof($File))
    {    
         $AllLines[$I]=trim(fgets($File)); 

        $Record_Elements=explode('|',$AllLines[$I]);

        

        if(isset($Record_Elements[0]))
       { if($Record_Elements[0]==$record_line_no)
        {
            $position_to_update=$I;

        }
    
    
       }

       $I=$I+1;

         
    }
    
    fclose($File);
    
    
    
    
    
     
    $file=fopen('allOrders.txt','r');

    while(!feof($file))
    {

        $record=trim(fgets($file));
        $record_elements=explode('|',$record);

        

         if(isset($record_elements[0]))
        { if($record_elements[0]==$record_line_no)
        {

            $found=true; 

           // echo $record;
            break;

         }
        }

         


    }

    if($found=true && $record_elements[2]=='approved' )
    {
        if($decision=='yes'){$record_elements[2]='complete';}
        else{$record_elements[2]='cancelled';}

        $new_record=$new_record.$record_elements[0];
          
        for($i=0; $i<count($record_elements); $i=$i+1)
        {

           if(isset($record_elements[$i]) && isset($record_elements[$i+1]) )
           {$new_record=$new_record.'|'.$record_elements[$i+1];}
            

        }
        echo $I;
        echo '\r\n-----------------------------\r\n';
        echo $new_record;

        echo '\r\n-----------------------------\r\n';



         
    }

    fclose($file);

    $i=0;

    echo "<html><title></title><body><table border='1'>";

    $FILE=fopen('allOrders.txt','w');

    for($i=0; $i<$I-1; $i=$i+1)
    {if(isset($AllLines[$i]))
       {  
        if($i==$position_to_update)
        {

            $AllLines[$i]=$new_record;
        }

        echo '<tr><td>'.$AllLines[$i].'</td></tr>';

        fwrite($FILE,  trim($AllLines[$i])."\r\n");    
       }
    }

    echo "</table></body></html>";

    fclose($FILE);
 
    if($decision=='yes'){ header('location: editingCustomerAndRestaurantBalanceAfterDelivery.php?');}
    else{header('location: customerDashboard.php?message=order_cancelled');}
}

else{header('location: customerReceivingOrder.php?err=delivery_not_complete');}

?>