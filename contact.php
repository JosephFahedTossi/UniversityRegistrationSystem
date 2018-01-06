<?php
if(isset($_POST['sendMessage'])) {
    // starting the session
    session_start();
    // variables
$email = $_POST['email'];
$age = $_POST['age'];
$message = $_POST['message'];
$message = wordwrap($message, 100);

if(empty($email) || empty($age) || empty($message)){
    echo "<center>Please fill in all the given fields.</center>";
}
    else {
        $from="From: $email<$email>\r\nReturn-path: $email";
        $subject="Message sent using your contact form";
        ini_set( 'sendmail_from', "josephfahedtossy@outlook.com" );
        ini_set( 'SMTP', "smtp-mail.outlook.com" );
        ini_set( 'smtp_port', 25 );
        ini_set('auth_username',"josephfahedtossy@outlook.com");
        ini_set('auth_password',(''));
        mail('josephfahedtossy@outlook.com', $subject, $message, $from);
        echo "<center>Message sent to administration.</center>";
        }
    }

?>
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
            opacity:0.96;
        }
    </style>
</head>
<body>
<div class="header">

    <div class="header">
        <ul>
            <li><a href="dashboard.php">Home</a></li>

            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

</div>
<br>
<div class='container'>
    <div class='row'>
        <div class='col-sm-10 col-sm-offset-1'>
            <div class='well'>

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class='row'>
                        <div class='col-sm-4'>
                            <div class='form-group'>
                                <label for='email'>Email</label>
                                <input type='text' name='email' class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label for='age'>Age</label>
                                <input type='number' name='age' class='form-control' />
                            </div>
                        </div>
                        <div class='col-sm-8'>
                            <div class='form-group'>
                                <label for='message'>Message</label>
                                <textarea class='form-control' name='message' rows='10'></textarea>
                            </div>
                            <div class='text-right'>
                                <input type='submit' class='btn btn-primary' value='Send' name="sendMessage" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



</body>
</html>