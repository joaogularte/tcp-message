<?php

    function getWho(){
        echo "--------------------------\n";
        echo ">>>>    TCP Server    <<<<\n";
        echo "--------------------------\n";
        echo "by jvg\n";
    };

    function getTime(){
        echo "Data atual: ".date('d-m-Y')."\n";
    }

    function getIP(){
        echo shell_exec("hostname -I | cut -d ' ' -f1");
    }
    getWho();
    getTime();
    getIP();
    
?>