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
    <!--[if lt IE 9]>
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

.invalid:before {
  position: relative;
  left: 0px;
  content: "✖";
}

.error {color: #FF0000;}
</style>
</head>

<body style="font-family: source-sans-pro;">

<?php
$pwd_err = "";
$first_name = $sur_name = $SSN = $user_name = $e_mail = $pswd = $pswd2 = $d_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # put the recived data into the database
    $first_name = test_input($_POST['fname']);
    $sur_name = test_input($_POST["lname"]);
    $SSN = test_input($_POST["ssn"]);
    $user_name = test_input($_POST["username"]);
    $e_mail = test_input($_POST["email"]);
    $pswd= test_input($_POST["password1"]);
    $pswd2= test_input($_POST["password2"]);
    $d_type =test_input($_POST["diabetes"]);

    if ($pswd == $pswd2){
        include 'openDB.php';
        // put the received data into the database
        // Trying to INSERT into "patients"
        mysqli_query($link,"INSERT INTO temp_users(fname, lname, email, pwd, diabetes, ssn, username, user_type) VALUES
        ('$first_name','$sur_name', '$e_mail', '$pswd', '$d_type', '$SSN', '$user_name', 'patient')")
        or die("Could not issue MySQL query");
        include 'closeDB.php';
        include "../html/login.html";
    }
    else{
    $pwd_err = "passwords doesn't match";
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

    <div class="container">
        <header class="page_header">
            <a href="Home.html"><span></span><h4 class="logo">DiaBeatIt</h4></a>
            <nav>
      <ul>
        <li><a href="Home.html">Home</a></li>
        <li><a href="nutrition.html">Nutrition checker</a></li>
		 <li><a href="educational_page.html">Learn more</a></li>
        <li> <a href="login.html">Sign In&nbsp;</a></li>
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
                <!--action="add_temp_user.php"<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>-->
                    <fieldset>
                        <legend>Personal information:</legend>

                        <label for="myInput1">First Name:</label>
                        <input type="text" name="fname" placeholder="First Name" value="<?php echo $first_name;?>"
                               id="myInput1" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)"><br>

                        <label for="myInput2">Last name:</label>
                        <input type="text" name="lname" placeholder="Last Name" value="<?php echo $sur_name;?>"
                               id="myInput2" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)"><br>

                        <label for="myInput3">Social Security Number:</label>
                        <input type="tel" name="ssn" pattern="[0-9]{6}-[0-9]{4}" title="123456-1234" placeholder="123456-1234"
                               value="<?php echo $SSN;?>" required autofocus
                               id="myInput3" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)"> * <br>
                        <!--try to make boxes for the numbers, so they dont have to write "-" and so they cannot type more numbers than expected -->

                        <label for="myInput4">User Name:</label>
                        <input type="text" name="username" maxlength="16" placeholder="User123" value="<?php echo $user_name;?>" required
                               id="myInput4" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)"> * <br>

                        <label for="myInput5">Email:</label>
                        <input type="email" name="email" maxlength="50" placeholder="diabeatit@gmail.com"
                               value="<?php echo $e_mail;?>" required
                               id="myInput5" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)"> *  <br>

                        <label for="myInput6">Password:</label>
                        <input type="password" name="password1" maxlength="50" placeholder="*********" required
                               id="myInput6" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                               title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                               onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)"> <span class="error">* <?php echo $pwd_err;?></span> <br>

                        <label for="myInput7">Confirm Password:</label>
                        <input type="password" name="password2" maxlength="50" placeholder="*********" required
                               id="myInput7" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)">
                        <br>

                        <label for="dtypes">Diabetic Type:</label><br>
                        <input list="dtypes" name="diabetes" placeholder="Choose your type" required>
                        <datalist id="dtypes">
                            <option value="Type 1">
                            <option value="Type 2">
                            <option value="Gestational Diabetes">
                        </datalist> * <br><br>
                        <input type="submit" value="Register" onclick="return checkPassword()">
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
                <p id="length" class="invalid"><b>Minimum 8 characters</b></p>
            </div>
    </div>
 <section></section>
    <script>
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

        function checkPassword(){
            var pwd1 = documents.getElementById("myInput6");
            var pwd2 = documents.getElementById("myInput7");
            var test = wd1.value != pwd2.value;
            document.write(test);
            if (pwd1.value != pwd2.value){
                alert("Passwords doesn't match!");
                return false;
            }
            return true;
            }

                    // Focus = Changes the background color of input to SkyBlue
        function focusFunction(x) {
            document.getElementById(x).style.background = "#e6f9ff";
        }
        // No focus = Changes the background color of input to white
        function blurFunction(x) {
            document.getElementById(x).style.background = "";
        }
        function validationEmail() {
                alert("Thank you for registering! An email will be delivered shortly, please verify your email.");
        }

    </script>
</body>
</html>