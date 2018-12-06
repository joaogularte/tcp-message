<?php

    $host = "127.0.0.1";
    $port = 5353;
    $message = "OIa";
    set_time_limit(0);


    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Nao eh possivel criar o socket\n");

    echo "Socket do cliente criado.\n";
    $result = socket_connect($socket, $host, $port) or die("Nao eh possivel conectar no servidor\n");
    echo "Socket do cliente conectado ao servidor: ".$host.":".$port."\n";

    $result = socket_read($socket, 1024) or die("Nao pode ler do server\n");
    echo $result;

    while(true){
        $comando = readline("Digite um comando: ");
        echo "Comando digitado: ".$comando."\n";
        socket_write($socket, $comando, strlen($comando)) or die("Nao foi possivel enviar para o server\n");
        echo "Mensagem do server: \r\n";
        $msg = socket_read($socket, 1024);
        echo $msg;
        if($comando == "Tchau"){
            socket_close($socket);
            break;
        }
    }

    


 
?>