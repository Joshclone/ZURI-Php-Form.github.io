<?php

session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link href="stylesheet" rel="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<?php
echo "<h1><b>WELOME</b><br> " . $_SESSION['username'] . "</h1>"; ?>
<a href="logout.php">Logout</a>




<body id="txt">

</body>

</html>