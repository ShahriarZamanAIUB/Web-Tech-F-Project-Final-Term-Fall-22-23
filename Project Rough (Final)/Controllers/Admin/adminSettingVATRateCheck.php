<?php

if(isset($_COOKIE['current_vat_rate']) && isset($_POST['new_vat_rate']))
{
    
$current_vat_rate=$_COOKIE['current_vat_rate'];
$new_vat_rate=$_POST['new_vat_rate'];

if(isset($current_vat_rate) && isset($new_vat_rate))
{

    $file=fopen('VAT.txt','w');

    fwrite($file,$new_vat_rate);

    header('location: adminSettingVATRate.php?message=vat_rate_updated');

    setcookie('current_vat_rate',$current_vat_rate, time()-60*60, '/');


}
}
else{header('location: adminSettingVATRate.php?err=vat_rate_update_failed');}

?>