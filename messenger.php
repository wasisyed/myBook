<?php require 'inc/conn.inc';
if($_COOKIE['username'] && $_COOKIE['password']){
    if($_COOKIE['to']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myBook Messenger.</title>
            <!-- Bootstrap CSS(Cascading Style Sheet) Files. -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.css">
            <!-- Bootstrap JS(JavaScript) Files. -->
        <script src="js\jquery-3.4.1.js" charset="utf-8"></script>
        <script src="js\popper.min.js" charset="utf-8"></script>
        <script src="js\bootstrap.js" charset="utf-8"></script>
        <script src="js\bootstrap.bundle.js" charset="utf-8"></script>
            <!-- My own JS(JavaScript) File. -->
        <script src="js/app.js" type="text/javascript"></script>
            <!-- Some of My own HTML Styles. -->
        <link rel='stylesheet' href="css/custom.css" />
        <style>
            #send_message{
                display: inline-block;
                width: 150px;
            }
            #chat_box {
                width: 940px; display: inline-block;
            }
        </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron">myBook Messenger.
            <form action="" method="post">
                <button name="ch_person" type="submit" style="float: left; margin-top: 25px;" class="btn btn-outline-danger btn-sm">Change Person.</button>
            </form>
        </div>
        <?php require 'inc/navbar.inc'; ?>
        <?php
            if(isset($_POST['ch_person'])){
                header("location: select_person.php");
            }
        ?>
        <br />
        <form action="" method="post">
            <div id="chat_container">
                <div id="chat_show_div">
                    <?php
                        $to = $_COOKIE['to'];
                        $sql = "SELECT `message_body` FROM `messages` WHERE `message_to` = '{$to}';";
                        $dataset = $dbConnection->query($sql);
                        while($result = mysqli_fetch_assoc($dataset)){
                            echo "<p class='message bg-light'>{$result['message_body']}</p>";
                        }
                    ?>
                </div>
                <div id="chat_box_div">
                    <input style='margin-top: 50px; float: bottom;' type="text" id="chat_box" class="form-control" placeholder="Type a Message here..." />
                    <button type="button" id="send_message" class="btn btn-outline-success" onclick="ajax();">Send Message.</button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        // const target = document.querySelector('#chat_show_div');
        const target = $('#chat_show_div');
        var message = document.querySelector('#chat_box');
        var message_from = "<?php echo "{$_COOKIE['username']}"; ?>";
        var message_to = "<?php echo "{$_COOKIE['to']}"; ?>";
        function ajax () {
            // alert("Message: "+ message.value + "Message From: " + message_from + "Message To: " + message_to);
            var xhr = new XMLHttpRequest();
            xhr.open('POST' , 'message.php' , true);
            xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
            xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if(xhr.readyState === 4 && xhr.status === 200){
                    var result = xhr.responseText;
                    target.append(result);
                }
            };
            xhr.send("message=" + message.value + "&message_from=" + message_from + "&message_to=" + message_to);
            // xhr.send(form_data);
            // xhr.send();
        }
    </script>
</body>
</html>
<?php
    }else{
        header("location: select_person.php");
    }
}else{
    header("location: login.php");
}
?>