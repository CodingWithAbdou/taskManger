

<?php

use App\App;

function home() {
    return trim(App::get('config')['app']['home_url'] , '/');
}

function redicrect($to) {
    header("Location: $to");
}

function redicrect_home(){
    redicrect(home());
}

function back() {
    redicrect(($_SERVER['HTTP_REFERER'] ?? home()));
}

function view($name , $data) {
    extract($data);
    require "resources/{$name}.view.php";
}