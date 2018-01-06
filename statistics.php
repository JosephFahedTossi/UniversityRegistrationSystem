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
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style>
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

        body {
            background: linear-gradient(to top left, #8360bc, #aefaff);
            background-position: center;
            background-attachment: fixed;
            opacity:0.96;
        }

        table {

            color: black;
            margin: 15px 45px;
        }

        th {
            padding-right: 200px;
            padding-top:15px;
            padding-bottom: 25px;
        }
    </style>
</head>
<body>
<div class="header">

    <div class="header">
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="contact.php">Contact Administration</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <p>REGISTERED STUDENTS IN CURRENT YEAR</p><br>
    <?php
    foreach ($results as $result){
        echo "<hr>";
       print_r("<table><tr><th> Registered users : ".$result['username']."</th><th><center>Total of registration fees 
        : 3000$</center></th></tr>
        </table>");
    }
    ?>


</body>
</html>