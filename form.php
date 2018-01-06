
<!DOCTYPE html>
<html>
	<head>
	<title> Form Submission </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            * {
                text-align-all: center;
                background-color: inherit;
            }
            form {
                opacity:0.95;
                background-image: linear-gradient(to top right, #564688, #9848A5, #feffdb);
                border-radius: 7px;
                margin: 0 auto;
                padding-top:45px;
                padding-bottom:45px;
                padding-left:180px;
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
                border-radius: 2%;
            }
            input[type = text]{
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
           <h3>REGISTER, BE A PART OF OUR COMMUNITY</h3>
                <div class="links">
                    <a href="login.php">Log in</a>
                </div>
        </div>
        <span>
            <div class="message">
                <?php
                // an error message that appears to the user in case he uses wrong credentials.
                $error = '';
                // if the error is set and exist print it if not print a form.
                $error = isset($_GET['message']) ? $_GET['message'] : 'Sign up student Form';
                echo $error;
                ?>
            </div>
        </span>
            <!-- the form -->
		<form method="POST" action = "process.php" name="form">
            <!--php error log  -->
			<label>Name : </label>
			<br>
			<input type="text" name="username" id="username" placeholder="Please Type in your name"/>
			<br><br>
			<label>E-mail : </label>
			<br>
			<input type="email" name="email" id="email" placeholder="Please type in your E-mail"/>
            <br><br>
            <label>Password : </label>
            <br>
            <input type="password" name="password" id="password" placeholder="Please type in your password"/>
            <br><br>
            <label>Password confirmation : </label>
            <br>
            <input type="password" name="password1" id="password1" placeholder="Please confirm your password"/>
            <br><br>
            <label>Registration Fees : </label>
            <br>
            <?php
            echo "Your registration fee is : 250 U.S.D";
            ?>
            <br><br>
            <label>Registration Date : </label>
            <br>
            <?php
            echo date('d - m - y' );
            ?>
            <br><br>
            <input type = "submit"  name="Submit" id="submit">
		</form>

        </body>
	</html>