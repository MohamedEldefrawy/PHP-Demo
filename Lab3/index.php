<?php
session_start();
require_once("vendor/autoload.php");
$counter = 0;

function generate()
{
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
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width = device - width, initial - scale = 1">
    <link rel="stylesheet" href="./Static/css/style.css">
    <title>PHP Demo</title>
</head>
<body>

<?php
generate();
?>
</body>
</html>
