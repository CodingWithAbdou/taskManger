<?php


class TaskController {
    public function index() {
        $tasks = QueryConnection::getQuery('newdata');
        return require './resources/index.view.php';
    }  
    
    public function create() {
        // $description = $_POST['description'];
        $description = Request::get('description');
        QueryConnection::insert('newdata' , [
            'description' => $description,
            'completed' => '0',
        ]);
        header('Location: http://localhost/hsoub/');
    }  
}



