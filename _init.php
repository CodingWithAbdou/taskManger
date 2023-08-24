<?php

use App\App;
use App\Db\QueryConnection;
use App\Db\DBConnection;

require 'app/App.php';
require 'app/DB/DBConnection.php';
require 'app/DB/QueryConnection.php';
require 'app/core/router.php';
require 'app/core/request.php';
require 'app/controllers/TaskController.php';

require 'app/helper.php';

App::set('config' , require 'config.php');

QueryConnection::make(
    DBConnection::makeConnection(App::get('config')['database'])
);


