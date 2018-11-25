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
        $ip = shell_exec("hostname -I | cut -d ' ' -f1");
        echo "IP: ".$ip;
    }

    function getMAC(){
        $mac = shell_exec("ifconfig enp1s0 | grep ether | cut -d ' ' -f10");
        echo "MAC: ".$mac;
    }
  
    function getOS(){
        echo "OS: ".PHP_OS."\n";
    }

    function getDev(){
        echo "Nome do grupo: Joao, alcateia de um lobo só\n";
    }

    function getInfo(){
        $info = shell_exec("uname -a");
        echo "Infos do OS: ".$info;
    }


    function getDolar(){
        
    }
    
    getWho();
    getTime();
    getIP();
    getMAC();
    getOS();
    getDev();
    getInfo();

?>