<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DiaBeatIt User account</title>
    <link href="../css/register.css" rel="stylesheet" type="text/css">
    <!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page.
    We recommend that you do not modify it.-->
        <script>var __adobewebfontsappname__="dreamweaver"</script>
        <script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]-->
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!--[endif]-->
<style>

.label{
float: center;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #FFFFFF;
  color: #FF00FF;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
    font-family: source-sans-pro;
  font-size: 16px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: 0px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: Black;
}
.error {color: red;}

.invalid:before {
  position: relative;
  left: 0px;
  content: "✖";
}


</style>
</head>

<body style="font-family: source-sans-pro;">

<?php
use PHPMailer\PHPMailer\PHPMailer;
$pwd_err = $email_err = $usern_err = $ssn_err = $send_err = $total_err = "";
$first_name = $sur_name = $SSN = $user_name = $e_mail = $pswd = $pswd2 = $d_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo "post method done, ";
    $first_name = test_input($_POST['fname']);
    $sur_name = test_input($_POST["lname"]);
    $SSN = test_input($_POST["ssn"]);
    $user_name = test_input($_POST["username"]);
    $e_mail = test_input($_POST["email"]);
    $pswd= test_input($_POST["password1"]);
    $pswd2= test_input($_POST["password2"]);
    $d_type =test_input($_POST["diabetes"]);

    // check if ssn is already in use


    // check if username exists
    include_once 'openDB.php';
    $sql2 = mysqli_query($link, "SELECT id FROM temp_users where username='$user_name'");
    if($sql2->num_rows > 0){
        $usern_err = "Username is already in use, sorry! T-T ";
        //echo "Username is already in use, sorry! T-T ";
    }
    // check if email is in use
    $sql = mysqli_query($link, "SELECT id FROM temp_users where email='$e_mail'");
    if($sql->num_rows > 0){
        $email_err = "Email is already in use!";
        //echo "Email is already in use!, ";
    }

    // check if passwords are the same
    if ($pswd == $pswd2){
        //echo "passwords are the same, ";
        $hashedPassword = password_hash($pswd, PASSWORD_DEFAULT);
    }else {
        $pwd_err = "Passwords don't match!";
        //echo "Passwords don't match!";
    }

     // send the email
    $token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!$/()*';
    $token = str_shuffle($token);
    $token = substr($token, 0, 10);
    if($pwd_err == "" AND $email_err == "" AND $usern_err == ""){
        //echo "starting the phpMailer, ";
        require_once "../email/PHPMailer/PHPMailer.php";
        require_once "../email/PHPMailer/SMTP.php";
        require_once "../email/PHPMailer/Exception.php";
        //Create a new PHPMailer instance $mail = new PHPMailer
        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "diabeatit.ims@gmail.com";
        $mail->Password = 'ims_1234';
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($e_mail, 'DiaBeatIt');
        $mail->addAddress($e_mail);
        $mail->Subject = "Please verify your registration";
        $mail->Body = "
            <h1>Thanks for registering!</h1><br>
            Please click on the link below to confirm the registration:
            <a href='http://130.243.228.153/DiaBeatIt/w3tutorials/Project/IMS/HTML,CSS,JS/php/confirm_user.php?email=$e_mail&token=$token'>Click Here</a>
            ";
        if ($mail->send()){
            //echo "Email was sent, ";
            $status = "success";
            $response = "Email is sent!";
        }else{
            //echo "send() returned true, ";
            $send_err = "The email didn't send!";
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    }
    // if ssn, username, email, pwd and mail is okay then add user to database
    if($mail->send()){
            mysqli_query($link,"INSERT INTO temp_users(fname, lname, email, pwd, diabetes, ssn, username, user_type, isEmailConfirmed, token)
            VALUES ('$first_name','$sur_name', '$e_mail', '$hashedPassword', '$d_type', '$SSN', '$user_name', 'patient', '0', '$token')")
            or die("Could not issue MySQL query");
            echo "<script type='text/javascript'>alert('Thank you for registering, please verify the email :D');</script>";

    }else{
        $total_err = "email wasnt sent :( ";
        //echo "send error not empty, ";
    }
     include 'closeDB.php';
 }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
echo $pwd_err;
echo $email_err;
echo $usern_err;
echo $ssn_err;
echo $send_err;
echo $total_err;
?>

    <div class="container">
        <header class="page_header">
            <a href="Home.html"><span></span><h4 class="logo">DiaBeatIt</h4></a>
            <nav>
      <ul>
        <li><a href="../html/Home.html">Home</a></li>
        <li><a href="..html/nutrition.html">Nutrition checker</a></li>
		 <li><a href="../html/educational_page.html">Learn more</a></li>
        <li> <a href="../html/login.html">Sign In&nbsp;</a></li>
      </ul>
    </nav>
        </header>
        <section>
            <h1 class="hero_header heading_font">Create an Account</h1>
            <h1 class="hero_header">&nbsp;</h1>
        </section>
        <div style="width: 400px; float:left; height:500px; padding-left:366px;">
            <section class="about" id="about">
                <form name="register_patient" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST"><br><br>
                    <fieldset>
                        <legend align="center"><b>Personal information:</b></legend>

                        <label for="myInput1"><b>First Name:</b></label>
                        <input type="text" name="fname" placeholder="First Name" value="<?php echo $first_name;?>"
                               id="myInput1" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)"><br>

                        <label for="myInput2"><b>Last Name:</b></label>
                        <input type="text" name="lname" placeholder="Last Name" value="<?php echo $sur_name;?>"
                               id="myInput2" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)"><br>

                        <label for="myInput3"><b>* Social Security Number: </b></label>
                        <input type="tel" name="ssn" pattern="[0-9]{6}-[0-9]{4}" title="123456-1234" placeholder="123456-1234"
                               value="<?php echo $SSN;?>" required autofocus
                               id="myInput3" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)"><br>

                        <label for="myInput4"><b>* Username: <span class="error"><?php echo $usern_err;?></span></b></label>
                        <input type="text" name="username" maxlength="16" placeholder="User123" value="<?php echo $user_name;?>" required
                               id="myInput4" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)"> <br>

                        <label for="myInput5"><b>* Email:<span class="error"><?php echo $email_err;?></span></b></label>
                        <input type="email" name="email" maxlength="50" placeholder="diabeatit@gmail.com"
                               value="<?php echo $e_mail;?>" required
                               id="myInput5" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)">
                        <br>

                        <label for="myInput6"><b>* Password: <span class="error"><?php echo $pwd_err;?></span> </b></label>
                        <input type="password" name="password1" maxlength="50" placeholder="*********" required
                               id="myInput6" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                               title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                               onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)">  <br>

                        <label for="myInput7"><b>Confirm Password:</b></label>
                        <input type="password" name="password2" maxlength="50" placeholder="*********" required
                               id="myInput7" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)">
                        <br>

                        <label for="dtypes"><b>* Diabetic Type:</b></label><br>
                        <input list="dtypes" name="diabetes" placeholder="Choose your type" required>
                        <datalist id="dtypes">
                            <option value="Type 1">
                            <option value="Type 2">
                            <option value="Gestational Diabetes">
                        </datalist> <br><br>
                        <input type="submit" value="Register" onclick="sendEmail()" class="btn btn-primary">
                    </fieldset>
                </form>
            </section>
            <div style="float:left">
            </div>
        </div>
               <div id="message" style="width: 210px; float:right; height:100px; padding-right:140px; padding-top:430px;">
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid"><b> A lowercase letter</b></p>
                <p id="capital" class="invalid"><b> A capital (uppercase) letter</b></p>
                <p id="number" class="invalid"><b> A number</b></p>
                <p id="length" class="invalid"><b> Minimum 8 characters</b></p>
            </div>
    </div>
 <section></section>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function sendEmail() {
            var email = $("#e_mail");
            if (isNotEmpty(email)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: 'DiaBeatIt',
                       email: email.val(),
                       subject: 'Please verify your email',
                   }, success: function (response) {
                   // this part is useless :P
                   console.log("before if statement");
                        if (response.status == "success")
                            alert('Email Has Been Sent!');
                        else {
                            alert('Please Try Again!');
                            console.log(response);
                        }
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }


    var myInput = document.getElementById("myInput6");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }
    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }
    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
    }
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }
    // Validate length
    if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
        }
    }

    // Focus = Changes the background color of input to SkyBlue
    function focusFunction(x) {
        document.getElementById(x).style.background = "#e6f9ff";
    }
    // No focus = Changes the background color of input to white
    function blurFunction(x) {
        document.getElementById(x).style.background = "";
    }
    </script>
</body>
</html>
