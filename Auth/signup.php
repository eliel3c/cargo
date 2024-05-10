<?php

session_start();
    $conn = mysqli_connect("localhost","root","","cargo");

    if(!$conn){
        echo "Not connected!";
    }

    if(isset($_SESSION['uid'])){
        header("Location: ../index.php ");
    }

    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        $check = mysqli_query($conn, " SELECT * FROM Manager WHERE username = '{$uname}' " );
        if(mysqli_num_rows($check) > 0){
            echo " Username already exist!";
        }else{
            $sql = mysqli_query($conn, "INSERT INTO manager(username, `password`) VALUES('{$uname}','{$pass}') ");
            if($sql == true){
                $query = mysqli_query($conn, " SELECT * FROM manager WHERE username = '{$uname}' AND `password` = '{$pass}'" );
                $fetch = mysqli_fetch_assoc($query);
                $_SESSION['uid'] = $fetch['managerid'];
                header("Location: ../index.php");
            }else{
                echo "Not inserted";
            }
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP</title>
    <link rel="stylesheet" href="../style/signup.css">
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <h2>SIGN-UP Form</h2>
            <p>Username</p><br>
            <input type="text" name="uname" placeholder="Create username"><br><br>
            <p>Password</p><br>
            <input type="password" name="pass" placeholder="Create password"><br><br>
            <button type="submit" name="submit">Create</button>
        </fieldset>
    </form>
</body>
</html>