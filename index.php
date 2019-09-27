<?php
require 'inc/conn.inc';
if ($_COOKIE['username'] && $_COOKIE['password']){
 ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>myBook Main Page.</title>
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
            #welcome {
              float: right; margin-top: 90px;
            }
            #logout{
                width: 80px; height: 30px;
                font-size: 0.3em; float: left;
                margin-top: 85px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
            <form action="" method="post">
              <button type="submit" class="btn btn-outline-danger" name="logout" id="logout">Logout.</button>
            </form>
              myBook Posts.
              <p id="welcome" style="font-size: 0.3em;">Welcome back <a href="#" style="font-size: 1.3em; "><?php echo $_COOKIE['username']; ?></a></p>
            </div>
            <?php
                if(isset($_POST['logout'])){       
                    setcookie("username","",time()-1);
                    setcookie("password","",time()-1);
                    header("location: login.php");
                }
            ?>
            <?php require 'inc/navbar.inc'; ?>
            <br />
            <?php
                $sql = "SELECT `username`,`tag`,`body` FROM `user_posts` ORDER BY `pid` DESC;";
                $dataset = $dbConnection->query($sql);
                while($result = mysqli_fetch_assoc($dataset)){
                echo "<fieldset style='margin-top: 30px; border: 2px solid silver;'>";
                echo "<div style='padding: 0.8em;'>";
                echo "<div class='bg-light' style='float: left; width: 100%; text-align: left; height: 30px;'><a href='' style='margin-left: 8px;'>{$result['tag']}</a><p style='margin-left: 5px; display: inline;'>, was Added by </p><a href=''>{$result['username']}</a></div><br /><br />";
                echo "<div><p>{$result['body']}</p></div>";
                echo "</div>";
                echo "</fieldset>";
            }
            echo "<br /><br />";
            ?>
        </div>
    </body>
</html>
<?php
}else{
    header("location: login.php");
}
?>
