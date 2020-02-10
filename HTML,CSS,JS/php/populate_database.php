//Script populating the different tables in database
<?php
include 'db.php';

//Adding new patients
for ($i = 1; $i <= 50; $i++) {
    $username = "patient" . $i;
    $email = "patient" . $i . "@hotmail.com";
    $pwd = "pass1";
    $ssn = "1-9" . $i;
    $type = "patient";
    if ($i % 2 == 0) {
        $diabetes = "Type 2";
        }
    else {
        $diabetes = "Type 1";
    }
    $fname = "first" . $i;
    $lname = "last" . $i;

    //Hashing password
    $pw_hash = password_hash($pwd, PASSWORD_DEFAULT);

    //Adding entry to database
    $patient_add = "INSERT INTO users(username, email, pwd, ssn, user_type, diabetes, fname, lname) VALUES ('$username', '$email', '$pw_hash', '$ssn', '$type', '$diabetes', '$fname', '$lname')";
    mysqli_query($link, $patient_add);
}

//Adding new doctors
for ($k = 1; $k <= 50; $k++) {
    $user = "doctor" . $k;
    $email = "doctor" . $k . "@hotmail.com";
    $pwd = "password1";
    $ssn = "9-1" . $k;
    $type = "doctor";
    $fname = "fname" . $k;
    $lname = "lname" . $k;
    $workplace = "uppsala" . $k;

    //Hashing password
    $pw_hash = password_hash($pwd, PASSWORD_DEFAULT);

    //Adding entry to database
    $doctor_add = "INSERT INTO users(username, email, pwd, ssn, user_type, fname, lname, workplace) VALUES ('$user', '$email', '$pw_hash', '$ssn', '$type', '$fname', '$lname', '$workplace')";
    mysqli_query($link, $doctor_add);
}

//Adding relationships between doctors and patients
for ($j = 1; $j < 25; $j++) {
    $relationship_add = "INSERT INTO patients_doctors(patient_id, doctor_id) VALUES ($j, $j+50)";
    $relationship_add2 = "INSERT INTO patients_doctors(patient_id, doctor_id) VALUES ($j+1, $j+50)";
    mysqli_query($link, $relationship_add);
    mysqli_query($link, $relationship_add2);
}

//Adding readings for patients
for ($r = 1; $r < 32; $r++) {
    for ($s = 1; $s < 6; $s++) {
        if ($r < 10) {
            $date = "2020-01-0" . $r;
        }
        else {
            $date = "2020-01-" . $r;
        }

        $time = "17:29:00";

        if ($r % 2 == 0) {
            $bgl = 100.0;
        }
        elseif ($r % 3 == 0) {
            $bgl = 90.0;
        }
        else {
            $bgl = 75.0;
        }

        $readings = "INSERT INTO readings(rtime, rdate, bgl, patient_id) VALUES ('$time', '$date', $bgl, $s)";
        mysqli_query($link, $readings);
    }
}
?>

