<?php require 'inc/conn.inc';   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myBook Login.</title>
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
            #uname {
                width: 380px; margin-right: 100px;
                display: inline-block;
            }
            #upass {
                width: 380px;
                display: inline-block;
            }
            #uemail {
                width: 865px; display: inline-block;
            }
            #login_submit{
                width: 250px;
            }
        </style>
</head>
<body>
    <div class="container">
           <!-- A Simple Jumbotron. -->
        <div class="jumbotron">myBook Login Page.</div>
            <!-- A Form For getting LogIn Info from the user. -->
        <form action="" method="POST">
            <div>
                <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter your Username here..." />
                <!-- <br /><br /> -->
                <input type='password' class="form-control" id="upass" name="upass" placeholder="Enter your Password here..." />
                <br /><br />
                <input type="email" class="form-control" id="uemail" name="uemail" placeholder="Enter you Email here..." />
            </div><br />
            <div>
                <button type="submit" class="btn btn-outline-success btn-lg" id="login_submit">Authenticate User.</button>
                <button type="reset" class="btn btn-outline-danger btn-sm" id="login_reset">Clear Form.</button>
            </div><br />
            <div>
                <!-- If the person trying to login does not have any account. -->
                <hr>
                <p>Do not have an Account.<a href="./register.php" title="Create a new Account">  Register Now.</a></p>
                <hr>
            </div>
        </form>
    </div>
</body>
</html>
<?php
if (!empty($_POST)){
    $username = $_POST['uname'];
    $password = $_POST['upass'];
    $email = $_POST['uemail'];
    $password = md5($password);

    $sql = "SELECT * FROM `users` WHERE `uname`='{$username}' AND `pass_hash`='{$password}' AND `email`='{$email}';";
    // echo $sql;
    $dataset = $dbConnection->query($sql);
    $result_dataset = mysqli_num_rows($dataset);
    if ($result_dataset === 1) {
        header("location: index.php");
        setcookie("username","{$username}",time()+60*60);
        setcookie("password","{$password}",time()+60*60);
    }else{
        echo "<script>  alert('Login Failed!! Please Check Your Credentials and try again!!!'); </script>";
    }
}


?>