<html>
<head>
    <style>
        p {
            margin: 85px 85px;
            background-color: midnightblue;
            color: whitesmoke;
            padding: 15px;
            border-radius: 5px;
        }
        </style>
</head>
<body>

<?php
session_start();
define ("filesplace","C:/xampp/htdocs/uploads");
$name = $_SESSION['user']['username'];

    if (is_uploaded_file($_FILES['classnotes']['tmp_name']))
    {

    if ($_FILES['classnotes']['type'] != "application/pdf" || $_FILES['classnotes']['type'] == "image/jpeg"
        || $_FILES['classnotes']['type'] == "image/png" || $_FILES['classnotes']['type'] == "image/gif" )
    {
echo "<p><center>Diploma must be uploaded in PDF format.</center></p>";
    }
else
    {
$result = move_uploaded_file($_FILES['classnotes']['tmp_name'], filesplace."/$name.pdf");
if ($result == 1)
    echo "<p><center>Upload done.</center></p>";
else
    echo "<p><center>Sorry, Error happened while uploading.</center> </p>";
    }
        header( "refresh:1;url=dashboard.php" );
    }
?>
</body>
</html>
