<?php
require 'inc/conn.inc';
// sleep(1);
function is_ajax(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}
if(is_ajax()){
    // echo "This is an ajax Request";
    $message = isset($_POST['message']) ? $_POST['message'] : null;
    $message_from = isset($_POST['message_from']) ? $_POST['message_from'] : null;
    $message_to = isset($_POST['message_to']) ? $_POST['message_to'] : null;
    // echo  "<br />" . $message . "<br />" . $message_from . "<br />" . $message_to . "<br />";
    $sql = "INSERT INTO `messages` (`message_from` , `message_to` , `message_body`) VALUES ('{$message_from}' , '{$message_to}' , '{$message}');";
    $dataset = $dbConnection->query($sql);
    $sql1 = "SELECT `message_body` FROM `messages` WHERE mid = (SELECT MAX(`mid`) FROM `messages`);";
    $dataset1 = $dbConnection->query($sql1);
    while($result = mysqli_fetch_assoc($dataset1)){
        echo "<p id='message' class='bg-light'>{$result['message_body']}</p>";
    }
}else{
    echo "This is not an ajax request.";
    exit;
}
?>