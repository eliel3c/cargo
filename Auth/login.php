<?php


session_start();
    $conn = mysqli_connect("localhost","root","","cargo");

    if(!$conn){
        echo "Not connected!";
    }

    if(isset($_SESSION['uid'])){
        header("Location: ../index.php ");
    }


    if(isset($_POST['login'])){
        $uname =  $_POST['uname'];
        $pass =  $_POST['password'];

        $check = mysqli_query($conn, " SELECT * FROM manager WHERE username = '{$uname}' AND `password` = '{$pass}' " );
        if(mysqli_num_rows($check) == 1){
            $fetch = mysqli_fetch_assoc($check);
            $_SESSION['uid'] = $fetch['managerid'];
            header("Location: ../index.php");
        }else{
            echo "Username or password is incorrect!";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN FORM</title>
    <link rel="stylesheet" href="../style/login.css">
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <h2>LOG-IN Form </h2>
            <p>Username</p><br>
            <input type="text" name="uname" placeholder="Enter your username"><br><br>
            <p>Password</p><br>
            <input type="password" name="password" placeholder="Enter your Password"><br><br>
            <button type="submit" name="login">LOGIN</button>
        </fieldset>
    </form>
</body>
</html>