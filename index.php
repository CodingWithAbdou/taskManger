<?php 


require './_init.php';


Router::make()
    ->get('' , [TaskController::class , 'index'])
    // ->get('about' , 'app/controllers/about.php')
    // ->post('create/task' , [TaskController::class , 'create'])
    ->resolve(Request::uri() , Request::type());