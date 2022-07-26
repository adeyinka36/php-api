<?php

use App\Connection\Connection;
use App\Exceptions\TaskException;
use App\Models\Tasks\Tasks;


require_once realpath('../vendor/autoload.php');

//lights on

$connection  = new Connection();
try {
    $connection::write();
    var_dump($connection::write());
}catch (\Exception $e) {
    echo $e->getMessage();
}
try {
    $t =  new Tasks('10', 'Task One','First description', 'Y', '12/10/2022', );
    var_dump($t->dataAsArray());
} catch (TaskException $e) {
    $message =  $e->getMessage();
    echo "; $message";
}
