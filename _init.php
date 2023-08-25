<?php

use App\App;
use App\Db\QueryConnection;
use App\Db\DBConnection;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require 'vendor/autoload.php';

App::set('config' , require 'config.php');


$log = new Logger('PHP_BASICS');
$log->pushHandler(new StreamHandler('one.log', Logger::INFO));

QueryConnection::make(
    DBConnection::makeConnection(App::get('config')['database']),
    $log
);


