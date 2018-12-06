<?php

    include './getters.php';

    $host = "127.0.0.1"; //LOOPBACK
    $port = 5353;
    set_time_limit(0);



    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Não eh possivel criar o socket");
    
    echo "Socket do servidor criado\n";

    $result = socket_bind($socket, $host, $port) or die("Nao eh possivel fazer o bind");
    echo "Bind no socket do servidor: ".$host.":".$port."\n";

    $result = socket_listen($socket, 3) or die ("Nao foi possivel configurar o socket como listener\n");

    do{

    
        $socketClient = socket_accept($socket) or die("Nao pode aceitar conexoes");

        $msg = getCabecalho();

        socket_write($socketClient, $msg, strlen($msg));
    

        do{

        
            $input = socket_read($socketClient, 1024) or die("Nao pode ler o input\n");
            $input = trim($input);
            echo "Comando do cliente: ".$input."\n";
            $input = str_replace('\\', '', $input);
            
            switch($input){

                case "quem":
                    $output = getWho();
                    break;

                case "data":
                    $output = getTime();
                    break;
                case "ip":
                    $output = getIP();
                    break;
                case "mac":
                    $output = getMAC();
                    break;
                case "sys":
                    $output = getOS();
                    break;
                case "dev":
                    $output = getDev();
                    break;
                case "info";
                    $output = getInfo();
                    break;
                
                case "dolar":
                    $output = getDolar();
                    break;
                default:
                    $output = "Desculpe, comando errado\n";
            }
            
            socket_write($socketClient, $output, strlen($output)) or die ("Nao pode escrever ");
        } while(true);
        socket_close($socketClient);
    }while(true);

    socket_close($socket);

?>