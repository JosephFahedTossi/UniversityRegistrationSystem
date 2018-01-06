<?php
session_start();
    //connection establishment between database users on localhost server
$connection =  mysqli_connect ("localhost", "root", "", "users");
$query2 = "SELECT * FROM users_table ";
    //query the sql with the connection
$results = mysqli_query($connection, $query2);

    // assign user to an empty array
$users = array();
    // looping through an associatuve array (elt of database)
$num = mysqli_num_rows($results);
foreach ($results as $result) {
// cookie for name of users
    $cookie_name = "usersRegistered";
    $cookie_value = $result['username'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 15), "/"); // 86400 = 1 day in this case 15 days
// cookie for email of users
    $cookie_name = "usersEmail";
    $cookie_value = $result['email'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 15), "/"); // 86400 = 1 day in this case 15 days
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- css -->
        <style>

            body {
                width: 97%;
                margin: 0 auto;
                padding: 0;
                font-family: sans-serif;
                background-image: linear-gradient(to top right, #f6f7ff, #f7e6ff, #84ffec, #9e82cb);
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
                -webkit-filter: blur(0px) ;
            }
            .header {
                width: 100%;
                padding: 5px 0;
                text-align: center;
                color: #f0fffc;
            }

            .header ul{
                background-image: linear-gradient(to top left, #1b153b, #6d73ff);
                overflow: hidden;
                color: #f0fffc;
                padding-right: 40px;
                text-align: center;
                margin: 5px;
                border-radius: 5px;
                opacity: 0.85;
            }

            .header ul li{
                display: inline-block;
                padding: 45px ;
                font-size: 2vw;
                color: #f0fffc;
            }

            .header ul li:hover{
                background-color: #0e0c7e;
            }

            .header a{
                cursor: pointer;
                text-align: center;
                color: #eafcff;
                text-decoration: blink;
                font-family: Rockwell;
            }

            .footer {
                padding-left: 45px;
                padding-right: 45px;
                padding-top: 15px;
                padding-bottom: 15px;
                font-family: "Calibri";
                font-size: 1.8vw;
                color: #10110e;
            }

            .container {
                font-family: "Fira Code";
                font-size: 1.12em;
            }

            table {
                text-align: center;
                padding-left: 45px;
            }

            td {
                margin: 0 auto;
                padding: 35px;
            }
            .upload {
                float: right;
            }
            #uploading {
                padding:15px;
                background-color: midnightblue;
                border-radius: 25px;
                opacity: 0.96;
                color: whitesmoke;
            }

            #fileToUpload {
                font-family: "Fira Code";
                font-weight: 600;
            }
        </style>

    </head>
<body>
<div class="header">
    <ul>
        <li><a href="contact.php">Contact Administration</a></li>
        <li><a href="statistics.php">Statistics</a></li>
        <li><a href="logout.php">Logout</a></li>

            </a></li>
    </ul>
</div>
<div class="container">
    <p><center><b>List of registered users</b></center></p>
    <hr>

    <?php
    foreach ($results as $result){
        print_r('<table><tr></tr><td><center>Student\'s name : '.$result['username']
        .'</center></td><td><center>E-mail : '.$result['email'].' </center></td><td><center>Registration Date : 
        '.$result['registration_date']
        .'</center></td></tr></table>' );
        echo "<hr>";
    }
    ?>
</div>
<!--footer authenticated user non-delicate information -->
<div class="footer">
    <?php
    // defining user properties
    $username = $_SESSION['user']['username'];
    $email = $_SESSION['user']['email'];
    $reg_date = $_SESSION['user']['registration_date'];
    $fees = '250 $ / Month';
    // printing properties of user to dashboard
    print_r("<hr>User : ".$username."<br>Registered at ".$reg_date." with a monthly fee of ".$fees."<br>");
    ?>
    <div class="upload">
        <form method="POST" action = "upload.php" name="formUpload" enctype="multipart/form-data">
            <input type="file" name="classnotes" id="fileToUpload">
            <input type="submit" value="Upload your Diploma" name="submit" id="uploading"/>
        </form>
    </div>
</div>
</body>
</html>