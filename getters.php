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
        $port = getservbyname("http", "tcp");
        $address = gethostbyname("economia.awesomeapi.com.br");
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        socket_connect($socket, $address, $port);

        $in = "GET /USD/1 HTTP/1.1\r\n";
        $in .= "Host: economia.awesomeapi.com.br\r\n";
        //$in .= "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:63.0) Gecko/20100101 Firefox/63.0\r\n";
        $in .= "Connection: Close\r\n\r\n";
        $out = '';

        socket_write($socket, $in, strlen($in));

        while($out = socket_read($socket, 2048)){
            echo $out;
        }
    }
    echo getservbyname("https", "tcp");
    echo gethostbyname("economia.awesomeapi.com.br");

    getWho();
    getTime();
    getIP();
    getMAC();
    getOS();
    getDev();
    getInfo();
    getDolar();
?>