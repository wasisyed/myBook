<?php require 'inc/conn.inc'; require 'inc/functions.inc'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myBook Register.</title>
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
            #fname , #uname{
                width: 500px; margin-right: 30px;
                display: inline-block;
            }   
            #upass , #conf_upass {
                width: 500px;  margin-right: 30px;
                display: inline-block;
            }
            #uemail {
                width: 1035px; margin-right: 30px;
                display: inline-block;
            }
            #ucontact ,#ucountry ,#ucity {
                width: 300px; margin-right: 50px;
                display: inline-block;
            }
            #udate, #umonth , #uyear {
                width: 130px; margin-right: 50px;
                display: inline-block;
            }
            #register_submit {
                width: 200px;
            }
            #label {
                margin-right: 2em;
                font-weight: 600;
            }
            .radio_label{
                margin-right: 30px;
            }
        </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron">myBook Register Page.</div>
        <form action="" method="POST">
            <div>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your Fullname here..." />
                <input type='text' class="form-control" id="uname" name="uname" placeholder="Enter your Username here..." /><br /><br />
                <input type="email" class="form-control" id="uemail" name="uemail" placeholder="Enter you Email here..." />
                
            </div><br />
            <div>
                <input type='password' class="form-control" id="upass" name="upass" placeholder="Enter your Password here..." />
                <input type='password' class="form-control" id="conf_upass" name="conf_upass" placeholder="Confirm Your Password here..." disabled />                
            </div><br />
            <div>
                    <input type='number' class="form-control" id="ucontact" name="ucontact" placeholder="Enter your Contact No here..." />
                    <select name="ucountry" id="ucountry" class="form-control">
                        <option active>Select your Country.</option>
                        <option value="United States of America">United States of America</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="China">China</option>
                        <option value="Japan">Japan</option>
                        <option value="Korea (North)">Korea (North)</option>
                        <option value="Korea (South)">Korea (South)</option>
                        <option value="Russia">Russia</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Saudia Arabia">Saudia Arabia</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Kawait">Kawait</option>
                        <option value="Alaska">Alaska</option>
                        <option value="Canada">Canada</option>
                        <option value="Norway">Norway</option>
                        <option value="Denmark">Denmark</option>
                        <option value="France">France</option>
                        <option value="Italy">Italy</option>
                    </select>
                    <input type='text' class="form-control" id="ucity" name="ucity" placeholder="Enter your City here..." />
            </div><br />
            <div>
                <label id="label">Select Date of Birth: </label>
                <select name="udate" id="udate" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
                <select name="umonth" id="umonth" class="form-control">
                    <option value="January">January</option>
                    <option value="Feburary">Feburary</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                <select name="uyear" id="uyear" class="form-control">
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1993">1993</option>
                    <option value="1992">1992</option>
                    <option value="1991">1991</option>
                    <option value="1990">1990</option>
                    <option value="1989">1989</option>
                    <option value="1988">1988</option>
                    <option value="1987">1987</option>
                    <option value="1986">1986</option>
                    <option value="1985">1985</option>
                    <option value="1984">1984</option>
                    <option value="1983">1983</option>
                    <option value="1982">1982</option>
                    <option value="1981">1981</option>
                    <option value="1980">1980</option>
                    <option value="1979">1979</option>
                    <option value="1977">1977</option>
                    <option value="1976">1976</option>
                    <option value="1975">1975</option>
                    <option value="1974">1974</option>
                    <option value="1973">1973</option>
                    <option value="1972">1972</option>
                    <option value="1971">1971</option>
                    <option value="1970">1970</option>
                    <option value="1969">1969</option>
                    <option value="1968">1968</option>
                    <option value="1967">1967</option>
                    <option value="1966">1966</option>
                    <option value="1965">1965</option>
                    <option value="1964">1964</option>
                    <option value="1963">1963</option>
                    <option value="1962">1962</option>
                    <option value="1961">1961</option>
                    <option value="1960">1960</option>
                </select>
            </div><br />
            <div>
                <label for="" id="label">Select Your Gender: </label>
                <input type="radio" class="form-check-input" id="male" name="ugender" value="Male" /><label class="radio_label" for="male">Male.</label>
                <input type="radio" class="form-check-input" id="fe-male" name="ugender" value="Fe-Male" /><label class="radio_label" for="fe-male">Fe-Male.</label>
            </div><br />
            <div>
                <button type="submit" class="btn btn-outline-success btn-lg" id="register_submit" >Sign Up</button>
                <button type="reset" class="btn btn-outline-danger btn-sm" id="register_reset" >Clear Form</button>
            </div><br />
            <div>
                <hr>
                <!-- If the person trying to login already has an account. -->
                <p>Already have an Account.<a href="./login.php" title="Login Now.">  Login Now.</a></p>
                <hr style="margin-bottom: 50px;">
            </div>
        </form>
        <div id="target">

        </div>
    </div>
    <script type="text/javascript">
        document.querySelector('#upass').addEventListener('keyup' , rmDisabled);

        function rmDisabled(e) {
            var upass = document.getElementById('upass').value;
            if (upass.length >= 6){
                $('#conf_upass').removeAttr('disabled');
            }else{
                $('#conf_upass').attr('disabled' , true);
            }
        }
        
    </script>
</body>
</html>

<?php
if(!empty($_POST)){
    //  Making Some local Variables to store some Values.
    $fname = $_POST['fname'];    $uname = $_POST['uname'];    $upass = $_POST['upass'];    
    $uemail =  $_POST['uemail'];   $ucontact = $_POST['ucontact'];    $ucountry = $_POST['ucountry'];
    $ucity = $_POST['ucity'];    $udate = $_POST['udate'];    $umonth =  $_POST['umonth'];    
    $uyear = $_POST['uyear'];    $ugender = $_POST['ugender']; $conf_upass = $_POST['conf_upass'];

    if ($upass === $conf_upass) {
        echo "<script> alert('Everything is Fine!!! Creating a new user Account.'); </script>";

        $dob = $udate . "/" . $umonth . "/" . $uyear;
        $pass_hash = md5($upass);

        $sql = "INSERT INTO `users`(`fname` , `uname` , `pass_hash` , `email` , `date_birth` , `contact_no` , `country` , `city` , `gender`) VALUES ('{$fname}' , '{$uname}' , '{$pass_hash}' , '{$uemail}' , '{$dob}' , '{$ucontact}' , '{$ucountry}' , '{$ucity}' , '{$ugender}');";
        // echo $sql;
        $dataset = $dbConnection->query($sql);

        $sql1 = "SELECT * FROM `users` WHERE fname='{$fname}' AND uname='{$uname}' AND upass='{$upass}' AND email='{$uemail}';";
        $dataset = $dbConnection->query($sql1);
        $result_dataset = mysqli_num_rows($dataset);
        if ($result_dataset > 0) {
            echo "You have been Signed Up Successfully.";
        }else{
            echo "There was an Error While Siging Up.";
        }
    }else{
        echo "<script>  alert('Passwords Don\'t Match');    </script>";
    }
}
?>
