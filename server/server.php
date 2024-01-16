<?php
use Workerman\Worker;

require_once __DIR__ . '/../vendor/autoload.php';
$wsWorker = new Worker('websocket://localhost:2345');
$wsWorker ->count = 10;


class wc {
    private $connection;
    public function tm () {

    }
}

$wsWorker ->onConnect = function ($connection) {
    echo "New connection \n";
};



$connection->on('message', function ($data) {
    $wc = new wc();
});










$wsWorker -> onMessage = function ($connection, $data)  {
    $timer =  130;
    $secund = 60;
    $minut  = round($timer/60, 0);
    $hours  = round($timer/(60*60), 0);

    $secund_1 = $timer - ($minut*60);

    if($timer<60) {
        $minut = 0;
        $secund = $timer;
    }else {
        $secund =  $secund_1;
    }

    while ($timer>0) {
        sleep(1);
        $data = $timer;
        $timer = $timer - 1;
        $connection->send($data);
    }
};


$wsWorker ->onClose= function ($connection) {
    echo "Connection closed \n";
};




Worker::runAll();

?>