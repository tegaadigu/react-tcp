#!/usr/bin/env php
<?php
require dirname(__DIR__) . '/react-tcp/vendor/autoload.php';


use OBD\Service;


$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server($loop);
$conns = new \SplObjectStorage();
$port = 9999;

$socket->on(
    'connection',
    function ($conn) use ($conns) {
        $conns->attach($conn);
        $conn->on(
            'data',
            function ($data) use ($conns, $conn) {
                echo 'data from ..' . $conn->getRemoteAddress() . PHP_EOL;

                (new Service())->process($data);

                echo PHP_EOL . 'next shenanigans..' . PHP_EOL;
                print_r($data);
                echo PHP_EOL . "HEX VERSION..." . PHP_EOL;
                foreach ($conns as $current) {
//                    if ($conn === $current) {
//                        continue;
//                    }
//                    $current->write($conn->getRemoteAddress() . ': ');
//                    $current->write($data);
                }
            }
        );
        $conn->on(
            'end',
            function () use ($conns, $conn) {
                $conns->detach($conn);
            }
        );
    }
);
echo "Socket server listening on port $port.\n";
echo "You can connect to it by running: telnet localhost $port\n";
$socket->listen($port, '0.0.0.0');
$loop->run();
