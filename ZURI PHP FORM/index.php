<?php
include 'config.php';
error_reporting(0);
session_start();

if(isset($_SESSION['username'])){
    header("Location: welcome.php");
}



if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if($result -> num_rows>0 ){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: welcome.php");
    } else{
        echo "<script>alert('Woops! Email or Password is wrong.')</script>";
    }
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
   
    <h1 id="text"><b>Login</b></h1>
   

    <div id="frm" class="jumbotron" style="width: 500px;">

        <form action="" method="POST">
          <p>
                <input type="text" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $email;?>" required />
            </p>

            <p>
               

                <input type="password" id="password" name="password" placeholder="Password" class="form-control" value="<?php echo $_POST['password']?>" required />
            </p>

        
            <p>

              
                <button type="submit" class="btn btn-success mt-3" name="submit">Login</button>
            </p>

            <p>
                Don't have an account?<a href="register.php">Register here</a>
            </p>
        </form>
    </div>


</body>



</html>