<?php 

require 'app/DB/DBCOnnection.php';
require 'app/DB/QueryConnection.php';
require 'app/core/router.php';
require 'app/core/request.php';
require 'app/controllers/TaskController.php';


QueryConnection::make(
    DBCOnnection::makeConnection()
);


