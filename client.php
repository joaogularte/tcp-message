<?php

    $host = "127.0.0.1";
    $port = 5353;
    $message = "OIa";
    set_time_limit(0);


    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Nao eh possivel criar o socket\n");
    echo "Socket criado.\n";
    $result = socket_connect($socket, $host, $port) or die("Nao eh possivel conectar no servidor\n");
    echo "Socket conectado: ".$host.":".$port."\n";

    socket_write($socket, $message, strlen($message)) or die("Nao foi possivel enviar para o server\n");

    $result = socket_read($socket, 1024) or die("Nao pode ler do server\n");

    echo "resultado do server ".$result."\n";

    socket_close($socket); 
?>