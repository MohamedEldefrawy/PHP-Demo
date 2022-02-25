<?php
$log_file = "";

if (file_exists("message_log.txt")) {
    $log_file = file("message_log.txt");
}
?>

<html lang='en'>
<head>
    <title> contact form </title>
</head>

<body>
<?php
foreach ($log_file as $log) {
    $data = explode(",", $log);
    $ip = explode(':', $data[1])[1];
    $name = explode(':', $data[2])[1];
    $email = explode(':', $data[3])[1];
    $message = explode(':', $data[4])[1];

    echo "<span style='font-weight: bold'>date</span> : $data[0]
        <br>
        <span style='font-weight: bold'>user ip</span> : $ip
        <br>
        <span style='font-weight: bold'>user name</span> :$name
        <br>
        <span style='font-weight: bold'>user email</span> :$email
        <br>
        <span style='font-weight: bold'>user message</span> :$message
        <hr>
        <br>";
}
?>
</body>

</html>
