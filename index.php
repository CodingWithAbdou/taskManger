<?php 

use App\Core\Request;
use App\Core\Router;

require './_init.php';


Router::make()
    ->get('' , [TaskController::class , 'index'])
    ->post('create/task' , [TaskController::class , 'create'])
    ->get('delete/task' , [TaskController::class , 'delete'])
    ->get('update/task' , [TaskController::class , 'update'])
    ->resolve(Request::uri() , Request::type());