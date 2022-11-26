<?php 

    session_start();
    session_destroy();
   // setcookie('status', 'true', time()-10, '/');

   foreach ( $_COOKIE as $key => $value )
{
    setcookie( $key, $value, time()-100, '/' );
}
    header('location: home.php?message=log_out_success');

?>