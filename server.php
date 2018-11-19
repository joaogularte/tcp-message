<?php
    $host = "127.0.0.1"; //LOOPBACK
    $port = 5353;

    set_time_limit(0);

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Não eh possivel criar o socket");
    echo "Socket criado\n";

    $result = socket_bind($socket, $host, $port) or die("Nao eh possivel fazer o bind");
    echo "Bind no socket: ".$host.":".$port."\n";

    $result = socket_listen($socket, 3) or die ("Nao foi possivel configurar o socket como listener\n");
    $socketClient = socket_accept($socket) or die("Nao pode aceitar conexoes");
    $msg = "Server disponivel ...";
    socket_write($socketClient, $msg, strlen($msg));
    
    $input = socket_read($socketClient, 1024) or die("Nao pode ler o input\n");
    echo "Cliente: ".$input;
    $output = strrev($input) . "\n";
    socket_write($socketClient, $output, strlen($output)) or die ("Nao pode escrever ");
    socket_close($socketClient);
    socket_close($socket);

?>