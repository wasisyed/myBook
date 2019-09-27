<?php
// This File is contains all the functions that I can use in any other file by using require 'functions.inc';.

// Context of these functions.
// 1-). A function for logging in. Parameters ($username,$password,$table,$connection,$location).
// 3-). A function that converts a dataset into table parameters ($dataset).
// 4-). A function that converts a simple password into salted and md5-hashed password. Parameters ($password).
// 5-). A function that santinizes a string and removes all characters of ASCII > 127 Parameters ($string).
// 6-). A function that removes all the characters from a password which are >127 in ASCII. Parameters ($password).
// 7-). A function that validates if the value entered is numeric or not. Parameters ($pin).
// 8-). A function that sanitizes an email and also validates it. Parameters ($email).
// 9-). A function that validates a url. Parameters ($url).
// 10-). A function that restrictes the user so he cannot run any type of query in any text filed. Parameters ($query).
// 11-). A function that converts a dataset into A beautiful NavBar with Dropdowns. Parameters ($dataset,$dataset0,$dataset1).
// 12-). A function converts a dataset into a simple and beautiful sidebar. Parameters ($dataset).
// 13-). A function that converts a dataset into a simple carousel. Parameters ($dataset,$dataset1).


// 1-). Fuction for Logging In.

function func_login ($username,$password,$table,$Connection,$location) {
    $func_login_q = "SELECT uid FROM `{$table}` WHERE username = '{$username}' AND password = '{$password}';";
    // echo $func_login_q;
    $func_login_res = $Connection->query($func_login_q);
        if (mysqli_num_rows($func_login_res) === 1) {
            // echo "You have been logged in Successfully";
            header("location: {$location}");
        }else {
            echo "Your Username or Password is incorrect.";
          }
      }

// This fuction is going to check wether the account opened is adminstrator's account or not.
function is_admin ($username,$password,$table,$Connection) {
    $is_admin_q = "SELECT type FROM `{$table}` WHERE username = '{$username}' AND password = '{$password}';";
    // echo $is_admin_q;
    $is_admin_res = $Connection->query($is_admin_q);
    $is_admin_ans = mysqli_fetch_assoc($is_admin_res);
    foreach ($is_admin_ans as $is_admin_for) {
      // code...
    }
      if ($is_admin_for === "Administrator") {
        // code...
        echo "Welcome Administrator!!!!";
      }elseif ($is_admin_for === "User") {
        // code...
        echo  "Welcome User!!";
      }elseif ($is_admin_for === "Multi-User") {
        // code...
        echo "Welcome Semi-Administrator.";
      }else {
        // code...
        echo "Welcome.";
      }

}
// This function is used to convert a dataset into a table.
function dataset_table ($dataset) {
  echo  "<table class='table table-hover table-striped table-bordered'>";
  // $select_query = "SELECT {$scope} FROM `{$table}`";
  // echo $select_query;
  // $dataset = $Connection->query($select_query);
  while ($row = mysqli_fetch_assoc($dataset)) {
    echo "<tr>";
    foreach ($row as $td) {
      // code...
      echo " <td>{$td}</td> ";
    }
    echo "</tr>";
  }
  echo "</table>";
}

// This function changes a password into an salted-hashed password.
function md5_hash($password) {
  // $md5_q = "SELECT ('{$password}')";
  // $pass0 = md5($password);
  $new_password = $password .= "f931b_1*";
  $pass = md5($new_password);
  // $pass0 = hash($password + "f931b_1*");
// echo $pass0;
  // $Connection->query($md5_q);
  echo $pass;
}
// This function removes all the characters of ASCII which are >127. (string).
function sant_string($string){
  $new_string = filter_var($string , FILTER_SANITIZE_STRING , FILTER_FLAG_STRIP_HIGH);
  echo $new_string;
}
// This function removes all the characters from a password which are >127 in ASCII.
function sant_password ($password){
  $new_password = filter_var($password , FILTER_SANITIZE_STRING , FILTER_FLAG_STRIP_HIGH);
  echo $new_password;
}
// This function validates that if the value entered is numeric or not.
function sant_pin($pin){
if (!filter_var($pin , FILTER_VALIDATE_INT) === false) {
    # code...
    echo "'{$pin}' is an int";
  }else{
    echo "'{$pin}' is not an int";
  }
}
// This function sanitizes an email and also validates it.
function sant_email($email){
  $new_email = filter_var($email , FILTER_SANITIZE_EMAIL);
  // echo $new_email;
  echo "<br>";
    if(!filter_var($email , FILTER_VALIDATE_EMAIL) === false){
      echo "{$email} is a valid email address";
    }else{
      echo "{$email} is not a valid email address";
    }
}
// This function validates a url.
function sant_url($url){

}
// This function restrictes the user so he cannot run any type of query in any text filed.
function sant_query($query){
  $regex = "/(select|update|delete|insert|drop)/mi";
  preg_match_all($regex , $query , $resut_regex, PREG_SET_ORDER);
  var_dump($result_regex);
}
// This function converts a dataset into Navbar.
function data_navbar($dataset,$dataset0,$dataset1,$dataset2){
  echo '
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="#">';
        $data2 = mysqli_fetch_assoc($dataset2);
        echo $data2['title'];
        echo '</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">';
      while($data = mysqli_fetch_assoc($dataset)){
      echo "<li class='nav-item'>
        <a class='nav-link active' href='{$data['href']}'>{$data['title']}</a>
      </li>";
      }
      echo '
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
    $data1 = mysqli_fetch_assoc($dataset0);
    echo $data1['title'];
      echo '
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
    while ($data0 = mysqli_fetch_assoc($dataset1)) {
        // code...
        echo "  <a class='nav-link active' href='{$data0['href']}'>{$data0['title']}</a>  ";
    }
      echo "
        </div>
        </li>
        </ul>
        </div>
        </nav>";
}
// This function converts a dataset into a simple and beautiful sidebar.
function data_sidebar($dataset){
  echo '<div class="col-md-3 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky sticky-top" style="top: 5em;">
               <ul class="nav flex-column mr-auto navbar-nav" id="sidebar">';
    while($data = mysqli_fetch_assoc($dataset)){
      echo "<li class='nav-item'>
        <a href='{$data['href']}' class='btn btn-link'>{$data['name']}</a>
      </li>";
    }
    echo '    </ul>
            </div>
         </div>';
}
// This function converts a dataset into a carousel.
function img_carousel($dataset,$dataset1){
  // $dataset1 = $dataset;
  echo '<div id="carousel_Ind" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">';
  $m=0;
  while($data = mysqli_fetch_assoc($dataset)){
    if($m==0){
     echo "<li data-target='#carousel_Ind' data-slide-to='{$m}' class='active'></li>";
    }
    else{
     echo "<li data-target='#carousel_Ind' data-slide-to='{$m}'></li>";
    }
    $m++;
  }
    echo '</ol>
  <div class="carousel-inner">';
  $number = 1;
    while($data0 = mysqli_fetch_assoc($dataset1)){
      while($number <= 1){
        echo "<div class='carousel-item active'>
          <img src='{$data0['src']}' style=' width: 1350px; height: 550px;' alt='{$data0['alt']}' />
        </div>";
        $number = $number + 1;
      }
      echo " <div class='carousel-item'>
       <img src='{$data0['src']}' style='width: 1350px; height: 550px;' alt='{$data0['alt']}' />
       </div>  ";
    }
    echo '</div>
  <a class="carousel-control-prev" href="#carousel_Ind" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel_Ind" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>';
// <img class="d-block w-100" src=".../800x400?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
// <img class="d-block w-100" src=".../800x400?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
// <img class="d-block w-100" src=".../800x400?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
}
 ?>
