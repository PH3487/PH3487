<?php

// check if http server request method is post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // check if isset .env file
    if(file_exists('.env')){
        // http bad request
        http_response_code(400);
        echo 'Bad request';
        exit();
    }
    $create = [
        'DB_USERNAME' => $_POST['DB_USERNAME'],
        'DB_PASSWORD' => $_POST['DB_PASSWORD'],
        'DB_HOST' => $_POST['DB_HOST'],
        'DB_NAME' => $_POST['DB_NAME'],
    ];
    // create .env file and convert $create to json
    $env = json_encode($create);
    file_put_contents('.env', $env);
    // redirect to index.php
    header('Location: index.php');
    exit();
}
