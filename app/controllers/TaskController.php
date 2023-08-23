<?php


class TaskController {
    public function index() 
    {
        $completed = Request::get('completed');
        if($completed != null) {
            $tasks = QueryConnection::getQuery('newdata' , ["completed" , "=" , "$completed"]);
        }else {
            $tasks = QueryConnection::getQuery('newdata');
        }
        view('index' , [
            'tasks' => $tasks
        ]);
    }  
    
    public function create() 
    {
        $description = Request::get('description');
        QueryConnection::insert('newdata' , [
            'description' => $description,
            'completed' => '0',
        ]);
        back();
    }    

    public function update() 
    {
        $id = Request::get('id');
        $completed = Request::get('completed'); 

        if($id && $completed == null) return ;

        QueryConnection::update('newdata' , $id , [
            'completed' => $completed ? 0 : 1 ,
        ]);
        back();
    }  

    public function delete() 
    {
        if($id = Request::get('id')) {
            QueryConnection::delete('newdata' , $id);
            back();
        }
    }  
}
