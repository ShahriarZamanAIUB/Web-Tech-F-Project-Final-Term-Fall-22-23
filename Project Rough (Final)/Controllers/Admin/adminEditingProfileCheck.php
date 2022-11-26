<?php

if(isset($_POST['new_username']) && isset($_POST['new_email']) && isset($_POST['new_password']))
{$new_admin_user_name=$_POST['new_username'];

$new_admin_email=$_POST['new_email'];


$new_admin_password=$_POST['new_password'];

$new_admin_record=trim($new_admin_user_name.'|'.$new_admin_password.'|'.$new_admin_email);

$file=fopen('allAdmins.txt','w');

fwrite($file,$new_admin_record);

setcookie('username',$new_admin_user_name, time()+72*60*60, '/');

setcookie('email',$new_admin_email, time()+72*60*60, '/');

setcookie('password',$new_admin_password, time()+72*60*60, '/');

fclose($file);

 header('location: adminEditingProfile.php?message=edit_published');

}

else{ header('location: adminEditingProfile.php?err=null');}


?>