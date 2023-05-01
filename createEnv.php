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
    $username = $_POST['DB_USERNAME'];
    $password = $_POST['DB_PASSWORD'];
    $host = $_POST['DB_HOST'];
    $name = $_POST['DB_NAME'];
    
    // create .env file and convert $create to json
    $fwrite = fopen(".env", "w") or die("Unable to open file!");
    fwrite($fwrite, "DB_USERNAME=$username\n");
    fwrite($fwrite, "DB_PASSWORD=$password\n");
    fwrite($fwrite, "DB_HOST=$host\n");
    fwrite($fwrite, "DB_NAME=$name\n");
    fclose($fwrite);
    echo json_encode(['success' => true, 'msg' => ".env file created"]);
    exit();
}else{
    // http bad request
    echo json_encode(['success'=> false, 'msg' => 'Bad request']);
}
