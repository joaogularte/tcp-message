<?php

    function getWho(){
        $msg = "--------------------------\n";
        $msg .= ">>>>    TCP Server    <<<<\n";
        $msg .= "--------------------------\n";
        $msg .= "by jvg\n";
        return $msg;
    };

    function getTime(){
        return "Data atual: ".date('d-m-Y')."\n";
    }

    function getIP(){
        $ip = shell_exec("hostname -I | cut -d ' ' -f1");
        return "IP: ".$ip;
    }

    function getMAC(){
        $mac = shell_exec("ifconfig enp1s0 | grep ether | cut -d ' ' -f10");
        return "MAC: ".$mac;
    }
  
    function getOS(){
        return "OS: ".PHP_OS."\n";
    }

    function getDev(){
        return "Nome do grupo: Joao, alcateia de um lobo só\n";
    }

    function getInfo(){
        $info = shell_exec("uname -a");
        return "Infos do OS: ".$info;
    }


    function getDolar(){
        $port = getservbyname("http", "tcp");
        $address = gethostbyname("economia.awesomeapi.com.br");
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        socket_connect($socket, $address, $port);

        $in = "GET /USD/1 HTTP/1.1\r\n";
        $in .= "Host: economia.awesomeapi.com.br\r\n";
        $in .= "Connection: Close\r\n\r\n";
        $out = '';

        socket_write($socket, $in, strlen($in));

        $out = socket_read($socket, 2048);
        $pos = strpos($out, '[');
        $json = substr($out, $pos);
        $json = str_replace("0", "", $json);
        $json = str_replace("[", "", $json);
        $json = str_replace("]", "", $json);
        $json = str_replace("\r\n\r\n\r\n", "", $json);
        return $json."\n";
        
    }

    function getCabecalho(){
        $msg = "#\r\n";
        $msg.= "#BEM VINDO\r\n";
        $msg.= "#\r\n";
        $msg.= "#\r\n";
        $msg.= "#TCP MESSAGE BY PHP :)\r\n";
        $msg.= "#\r\n";
        $msg.= "#\r\n";
        $msg.= "#\r\n";
        $msg.= "#COMMANDS AVAIABLE:\r\n";
        $msg.= "#-\\quem\r\n";
        $msg.= "#-\\data\r\n";
        $msg.= "#-\\ip\r\n";
        $msg.= "#-\\mac\r\n";
        $msg.= "#-\\sys\r\n";
        $msg.= "#-\\dev\r\n";
        $msg.= "#-\\info\r\n";
        $msg.= "#-\\dolar\r\n";
        $msg.= "#\r\n";
        $msg.= "#\r\n";
        $msg.= "#HAVING FUN!\r\n";

        return $msg;
    }


    getDolar();

    
?>