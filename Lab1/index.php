<?php
session_start();

$nameError = "";
$emailError = "";
$messageError = "";
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

if(!isset($_SESSION["is_visited"])){
    echo "First Visit, Hello!";
    $_SESSION["is_visited"]=true;

}else{
    $_SESSION["counter"] = isset($_SESSION["counter"]) ? $_SESSION["counter"] + 1 : 2;
    echo "you visited this page ".$_SESSION["counter"]." times\n";
}

if (isset($_POST["submit"])) {

    if (empty($name)) {
        $nameError = "name is required";
    }
    if (empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "please Enter valid email";
    }
    if (empty($message)) {
        $messageError = "message is required";
    }

    if (empty($nameError) && empty($emailError) && empty($messageError)) {
        $file_controller = fopen('message_log.txt', 'a+');
        $date = date("F j Y");
        $time = date("g:i a");
        $user_ip = $_SERVER['REMOTE_ADDR'];
        $message = trim($message);
        $line = "$date $time, ip: $user_ip, name: $name, email: $email, message:  $message\n";
        fwrite($file_controller, $line);
        fclose($file_controller);

        die("
        <html lang='en'>
            <head>
            <title> contact form </title>
            </head>

            <body>
                <span style='font-weight: bold'>user nameM</span> : $name
                <br>
                <span style='font-weight: bold'>email</span> : $email
                <br>
                <span style='font-weight: bold'>mesage</span> : $message
            </body>

        </html>
    ");
    }
}

function get_default($field)
{
    if (isset($_POST[$field])) {
        echo $_POST[$field];
    } else
        echo "";
}

?>

<html lang="en">
<head>
    <title> contact form </title>
</head>

<body>
<h3> Contact Form </h3>
<div id="after_submit">

</div>
<form id="contact_form" action="index.php" method="POST">

    <label style="color: red">
        <?php echo $nameError ?>
    </label>
    <label style="color: red">
        <?php echo $emailError ?>
    </label>
    <label style="color: red">
        <?php echo $messageError ?>
    </label>

    <div class="row">
        <label class="required" for="name">Your name:</label><br/>
        <input id="name" class="input" name="name" type="text" value="<?php get_default("name") ?>" size="30"/><br/>

    </div>
    <div class="row">
        <label class="required" for="email">Your email:</label><br/>
        <input id="email" class="input" name="email" type="text" value="<?php get_default("email") ?>" size="30"/><br/>

    </div>
    <div class="row">
        <label class="required" for="message">Your message:</label><br/>
        <textarea id="message" class="input" name="message" rows="7" cols="30">
            <?php get_default("message") ?>
        </textarea><br/>

    </div>

    <input id="submit" name="submit" type="submit" value="Send email"/>
    <input id="clear" name="clear" type="reset" value="clear form"/>
</form>
</body>

</html>