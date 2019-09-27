<?php
require 'inc/conn.inc';

if ($_COOKIE['username'] && $_COOKIE['password']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myBook Add Post.</title>
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
            #post_submit {
                width: 20%;
            }
        </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron">myBook Add Post.</div>
        <?php require 'inc/navbar.inc'; ?>
        <form action="" method="post">
            <div>
                <br />
                <input type="text" name="post_tag" id="post_tag" class="form-control" placeholder="Enter Post Tag here... (No Spaces and Starting with #)" /><br />
                <textarea name="post_body" class="form-control" id="post_body" rows="10"></textarea><br /> 
                <!-- <input type="file" class="form-control-file" name="post_img" id="post_img" /> -->
            </div>
            <div>
                <button type="submit" id="post_submit" name="post_submit" class="btn btn-outline-success btn-lg" >Add Post</button>
                <button type="reset" id="post_reset" name="post_reset" class="btn btn-outline-danger btn-sm">Reset Post</button>
            </div><br /><br />
        </form>
    </div>
</body>
</html>
<?php
}else{
    header("location: login.php");
}
if (!empty($_POST)){
    $post_tag = $_POST['post_tag'];
    $post_body = $_POST['post_body'];
    $sql = "INSERT INTO `user_posts` (`tag` , `body` , `username`) VALUES ('{$post_tag}' , '{$post_body}' , '{$_COOKIE['username']}');";
    $dataset = $dbConnection->query($sql);
    $sql1 = "SELECT * FROM `user_posts` WHERE `username` = '{$_COOKIE['username']}' AND `tag` = '{$post_tag}' AND `body` = '{$post_body}'";
    $dataset1 = $dbConnection->query($sql1);
    $ans = mysqli_num_rows($dataset1);
    if($ans > 0) {
        echo "<script type='text/javascript'> alert('Post Added Successfully'); </script>";
    }else{
        echo "<script type='text/javascript'> alert('Your Post Could not be added!!! Please Try Again'); </script>";
    }
}
?>