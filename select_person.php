<?php require 'inc/conn.inc'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myBook Select Person.</title>
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
</head>
<body>
    <div class="container">
        <div class="jumbotron">myBook Select Person.</div>
        <?php require 'inc/navbar.inc'; ?>
        <br />
        <form action="" method="post">
            <select name="person" class="form-control">
                <?php
                    $sql = "SELECT `uname` FROM `users`;";
                    $dataset = $dbConnection->query($sql);
                    while($result = mysqli_fetch_assoc($dataset)){
                        echo "<option value='{$result['uname']}'>{$result['uname']}</option>";
                    }
                ?>
            </select><br />
            <div>
                <button type="submit" class="btn btn-outline-success btn-block">Select Person.</button> 
            </div>
        </form>
    </div>
</body>
</html>
<?php
 if(!empty($_POST)){
    $person = $_POST['person'];
    setcookie("to","{$person}",time()+60*10);
    header("location: messenger.php");
 }
?>