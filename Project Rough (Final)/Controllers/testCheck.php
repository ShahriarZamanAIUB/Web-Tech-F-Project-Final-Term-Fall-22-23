 <html>
    <title>testCheck</title>
    <body>
    <form method='post' action='placeOrder.php' enctype=''>
    <?php
echo"<table border='1'>";

 

session_start();

$j=$_SESSION['test.php']['i'];

//echo $j;

$selected_rows_count=0;

$total_bill=0;

$net_price=0;
 
$i=0;

$order_serial=1;

$order_record=$order_serial.'|'.'KFC'.'|'.'pending'.'|'.$_COOKIE['username'].'|'.$_COOKIE['address'];

 

echo "<tr><td colspan='5' align='center'><h3>Your Order</h3></td></tr> ";
echo "<tr><td><h3>Food Item Name</h3></td><td><h3>Image</h3></td><td><h3>Quantity</h3></td><td><h3>Unit Price<br>(Tk.)</h3></td><td><h3>Net Price<br>(Tk.)</h3></td></tr> ";

 


while( $i<$j )
{
   if(isset($_POST['foodName'.$i]))
   {
    $selected_rows_count=$selected_rows_count+1;

    $foodName=$_POST['foodName'.$i];

    $selected_quantity=$_POST['selected_quantity'.$i];

    $foodPrice=$_COOKIE['food_price'.strval($i)];





    echo "<tr><td>".$foodName."</td> ";  

    echo "<td align='center' ><img src='allFoods/".$foodName.".jpg' width='60px' height='60px'></td>  ";
    
    if($selected_quantity>0)
                {echo "<td align='center' >".$selected_quantity."</td>  ";}

    else        {header('location: test.php?err=quantity_not_set');}

    if(isset($foodPrice))
                {echo "<td align='center' >".$foodPrice."</td>  ";

                    $net_price=$selected_quantity*$foodPrice;
                }

    echo "<td align='center' >".$net_price."</td></tr> ";
    
    $total_bill=$total_bill+$net_price;

     

    $order_record=$order_record.'|'.$foodName.'|'.$selected_quantity.'|'.$foodPrice.'|'.$net_price;

   }
$i=$i+1;

}

 

echo "<tr><td colspan='5'><hr></td></tr> "; 

echo "<tr><td colspan='4' align='center'><h3>Total Bill (Tk.)</h3></td><td align='center'><h4>".$total_bill."</h4></td></tr> "; 

echo "<tr><td colspan='5' align='center'> <input type='submit' value='Place Order'>&nbsp&nbsp&nbsp<input type='button' value='Cancel Order' onclick='history.back()'></td></tr> "; 

if($selected_rows_count==0 || $total_bill==0) {header('location: test.php?err=none_selected');}
//else if(($total_bill)==0)   {header('location: test.php?err=try_again'); }


 
 echo "</table>";
 
  $_SESSION['testCheck.php']['$order_record']= $order_record;
?>
</form>
 
</body>
</html>