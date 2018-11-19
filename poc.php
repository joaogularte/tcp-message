<?php 

    $out = shell_exec("ifconfig");
    echo $out;
    
    //echo $_SERVER['REMOTE_ADDR'];
    //echo php_uname();
    //echo PHP_OS;
?>