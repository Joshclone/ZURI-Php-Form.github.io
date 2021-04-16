<?php

include 'config.php';
error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {

        $sql = "SELECT * FROM users WHERE email= '$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {

            $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password' )";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Wow! User Registration Completed.')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Something Went Wrong.')</script>";
            }
            echo "<script>alert('Woops! Email Already Exists.')";
        } else {

            echo "<script>alert('Woops! Email Already Exists.')</script>";
        }
    }
} else {
    echo "<script>alert('Password Not Matched.')</script>";
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-compatible" content="ie=edge">
</head>


<body style="background: #CCC;">
    <h1>Zuri Tech Hub</h1><br>
    <h4><b>Sign Up</b></h4>
    <h4>Please fill this form to create an account.</h4>

    <div id="frm" class="jumbotron" style="width: 500px;">

        <form action="" method="POST">


            <p>


                <input type="text" id="username" method="POST" name="username" class="form-control" placeholder="Username" <?php echo $username; ?> required />
            </p>

            <p>
                <input type="text" id="email" name="email" placeholder="Email" class="form-control" <?php echo $email; ?> required />
            </p>

            <p>


                <input type="password" id="password" name="password" placeholder="Password" class="form-control" <?php echo $_POST['password']; ?> required />
            </p>

            <p>

                <input type="password" id="password" name="cpassword" placeholder="Confirm Password" class="form-control" <?php echo $_POST['cpassword']; ?> required />
            </p>

            <p>


                <button type="submit" class="btn btn-success mt-3" name="submit">Register</button>
            </p>

            <p>
                Aready a member?<a href="index.php">Sign in</a>
            </p>
        </form>
    </div>


</body>



</html>