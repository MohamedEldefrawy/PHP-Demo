<?php
session_start();
require_once("vendor/autoload.php");
$counter = 0;

if (isset($_POST)) {
    $loginUserDto = new LoginUserDto();
    $loginUserDto->setUserName($_POST["username"]);
    $loginUserDto->setPassword($_POST["password"]);

    if (UserService::check_login()) {
        $page = "items";
    } elseif (UserService::authenticate($loginUserDto->getUserName(),
        $loginUserDto->getPassword())) {
        Counter::increment();
        $counter = Counter::getCount();
        $file_controller = fopen('counter.txt', 'w+');
        $line = "number of unique users = $counter";
        fwrite($file_controller, $line);
        $page = "items";
    } else {
        $page = "login";
    }
}

//return response view
require_once("Views/$page.php");