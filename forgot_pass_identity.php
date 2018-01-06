<?php
if(isset($_POST['submit_email'])) {
    session_start();
    //connection establishment between database users on localhost server
    $connection = mysqli_connect("localhost", "root", "", "users");
    // new input check
    $email = $_POST['remail'];
    //create a new query
    $query = "SELECT * FROM users_table WHERE email = '$email' " or die (mysqli_error($query));
    // connecting query to the database connection and table within database users
    $selction = mysqli_query($connection, $query);
    // filter in the email is a real email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address';
    }
    // checks if the email exist in database
    $check = mysqli_fetch_row($selction)[2];
    //if the name exists it gives an error
    if ($check == 0) {
        $error[] = 'You are not a registered student.';
    }
    // if no errors then carry on
    if (!$error) {

        $query = ("SELECT * FROM users_table WHERE email = '$email' ") or die (mysqli_error($query));
        $r = mysqli_fetch_object($query);

        //create a new random password
        $password = substr(md5(uniqid(rand(), 1)), 3, 10);
        //encrypt password for security measure
        $pass = md5($password);
        //send email to the user
        $to = "$email";
        $subject = "Account Details Recovery";
        $body = "Please $r->username, nn you or someone else have requested your account details. nn Here is your account information please keep this as you may need this at a later stage. nnYour username is $r->username nn your password is $password nn Your password has been reset please login and change your password to something more rememberable.nn Regards Site Admin";
        $headers = "From: <josephfahedtossy@outlook.com>rn";
        mail($to, $subject, $body, $headers);
        //update database
        $sqli = "UPDATE users_table SET password='$pass' WHERE email = '$email'";
        mysqli_query($connection, $sqli);
        $resent = true;

        if ($resent == true) {
            echo "<p><center>You have been sent an email with your account details to $email</center></p>n";
        } else {
            echo "<p><center>Please enter your E-mail to receive a new password.</center></p>";
        }
    }
}
?>
<html>
<head>
    <title>Reset Pass</title>
    <style>
        .formal {
            padding-top: 165px;
            text-align: center;
        }

        form {
            background-color: #6554A2;
            opacity: 0.92;
            padding-top:25px;
            padding-bottom: 25px;
        }

        label {
            font-family: Rockwell;
            font-size: 21px;
        }

        .subm{
            background-color: antiquewhite;
            border-radius: 15px;
        }
        </style>
</head>
<body>
<p><center><hr><hr></center></p>
<div class="formal">
<form method="post" action="<?PHP $_SERVER['PHP_SELF']?>">
    <label>E-mail :</label>
    <input type="text" name="remail"><br><br>
    <input type="submit" value="Reset password" name="submit_email" class="subm">
</form>
</div>
</body>
</html>