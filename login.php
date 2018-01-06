<?php
//include "cnx.php";
    if (isset($_POST['login'])) {
        session_start();
        $error = '';
        //connect to database
        $connection =  mysqli_connect ("localhost", "root", "", "users");
        //email and password input stream
        $email = $_POST['email'];
        // using md5 for security purposes
        $password = $_POST['password'];
        $password = md5($password);
        // the query for selecting a user form the database Server Side Validation
        $query = "SELECT * FROM users_table WHERE email = '$email' AND password = '$password' limit 1";
        // apply query to database
       $results = mysqli_query($connection, $query);
       // session input fields (Server authentication)

        // assign user to an empty array
        $user = array();
            // looping through an associatuve array (elt of database)
            while ($row = mysqli_fetch_assoc($results)) {
                // assigning a new session called user
                $_SESSION['user'] = $row;
                break;
            }

        // conditioning if user exits and authenticated
        if(empty($email) || empty($password)) {
            // pass an error message in the field of error messages
            $error = $_GET['message'] = "empty email or password";
        }

        elseif(mysqli_num_rows($results) == 0){

            $error = $_GET['message'] = "Non-existing email or wrong password";
        }
        elseif( mysqli_num_rows($results) == 1){
            //print_r ($_SESSION['user']);

            //print_r ("Student name : ".mysqli_fetch_row($results)[1]);
            header('location: dashboard.php');
        }

    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Log in System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            text-align-all: center;
            background-color: inherit;
        }
        form {
            background-color: #5952db;
            border-radius: 7px;
            margin: 0 auto;
            padding-top:45px;
            padding-bottom:45px;
            padding-left:180px;
            opacity: 0.9;
        }
        label {
            margin: 0 auto;
            font-size: 100%;
            font-family: "Copperplate Gothic Light";
        }
        input {
            margin: 0 auto;
            margin-outside: 170px;
        }
        .header {
            background-color: #488AAD;
            font-family: "Agency FB";
            opacity: 0.9 ;
            text-align: center;
            border-radius: 15px;
        }

        input[type = password]{
            width: 35%;
            height: 25px;
            border-radius: 5px;
            background-color: whitesmoke;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            font-family: "Rage Italic";
            font-size: 1.5vw;
        }
        input[type = email]{
            width: 35%;
            height: 25px;
            border-radius: 5px;
            background-color: whitesmoke;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            font-family: "Rage Italic";
            font-size: 1.5vw;
        }
        input[type = submit]{
            width: 20%;
            height: 30px;
            box-sizing: border-box;
            border-radius: 15px;
            border: 1px solid aliceblue;
            background-color: #8360bc;
            text-align: center;
            opacity: 0.9;
            color: white;
            font-family: "MS Outlook";
            font-size: 100%;

        }
        .message {
            text-align: center;
            background-color: #6554A2;
            opcaity: 0.8;
            border-radius: 5px;
        }

        .links a {
            text-align:center;
            text-decoration: none;
            background-color: #262c2a;
            padding: 5px;
            border-radius:5px;
            color: antiquewhite;
            opacity: 0.9;
        }

        .links {
            padding-bottom: 25px;
            font-family: "Trebuchet MS";

        }
    </style>
</head>
<body>
<div class="header">
    <h3>Log in to your account</h3>
    <div class="links">
        <a href="form.php">Back to sign up</a>
    </div>
</div>
<span>
            <div class="message">
                <?php
                // an error message that appears to the user in case he uses wrong credentials.
                $error = '';
                // if the error is set and exist print it if not print a form.
                $error = isset($_GET['message']) ? $_GET['message'] : 'Login';
                echo $error;
                ?>
            </div>
        </span>
<!-- the form -->
<form  action = "<?php echo $_SERVER['PHP_SELF'];?>" name="form">
    <!--php error log  -->
    <label>E-mail : </label>
    <br>
    <input type="email" name="email" id="email" placeholder="E-mail"/>
    <br><br>
    <label>Password : </label>
    <br>
    <input type="password" name="password" id="password" placeholder="***************"/>
    <br><br>
    <input type = "submit"  value= "login" name="login" id="submit"/>
    </form>
<form method="POST" action = "forgot_pass_identity.php" name="form">
    <input type = "submit"  value= "F Reset password" name="forgot" id="forgot"/>
</form>

</body>
</html>