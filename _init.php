<?php

use App\App;
use App\Db\QueryConnection;
use App\Db\DBConnection;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require 'vendor/autoload.php';
require 'app/App.php';
require 'app/DB/DBConnection.php';
require 'app/DB/QueryConnection.php';
require 'app/core/router.php';
require 'app/core/request.php';
require 'app/controllers/TaskController.php';

require 'app/helper.php';


App::set('config' , require 'config.php');


$log = new Logger('PHP_BASICS');
$log->pushHandler(new StreamHandler('one.log', Logger::INFO));

QueryConnection::make(
    DBConnection::makeConnection(App::get('config')['database']),
    $log
);


