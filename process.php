<?php

if(isset($_POST['Submit']))
    {
        session_start();
        //connection establishment between database users on localhost server
        $connection =  mysqli_connect ("localhost", "root", "", "users");
        //username and password input stream
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password1 = $_POST['password1'];
        // applying certain measures for sql injection
                $username = stripcslashes($username);
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        // using MD5 encryption for the password field.
                $password = md5($password);
                $password1 = md5($password1);
        }

        //error message
        $error = $_GET['message'] = '';

        // conditioning in case user doesn't enter name, email or pass
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        header('Location: http://localhost/form.php?message= Please insert name, E-mail and password');
        exit();
    }
    // conditioning if the connection is established and records are added successfully ...
    elseif($password === $password1) {
        // inserting username, name and password
        $query = "INSERT INTO users_table(`username`, `email` , `password`) VALUES ('$username','$email', '$password')";
       // connecting query to the database connection and table within database users
        mysqli_query($connection, $query);
        // go to signin page to sign in or go to dashboard just change the header
        header('location: http://localhost/login.php');
        }
        // in case of error
        else
        {
            // a message indicating the error in the connection of the database and the given query
            header('Location: http://localhost/form.php?message= Passwords do not match, please try again.');
        }
        $connection -> close();

?>
