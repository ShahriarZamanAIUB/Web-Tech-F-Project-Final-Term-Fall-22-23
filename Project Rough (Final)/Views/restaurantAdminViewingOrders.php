 <?php


$file=fopen('allOrders.txt','r');

while(!feof($file))
{

$record=fgets($file);

echo $record;



}



?>