<?php 

include_once "./Auth/config.php";


if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $fowner = $_POST['fowner'];

    $sql = mysqli_query($conn, " INSERT INTO furniture(furniturename, furnitureownername) VALUES('{$fname}','{$fowner}') " );
    if($sql == true){
        echo "Record Added Successfully! <br/> <a href='./index.php'>Back To Home</a> ";
    }else{
        echo "Not INsterted";
    }


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD FURNITURE</title>
    <link rel="stylesheet" href="./style/f_add.css">
</head>
<body>



<header class="links">
        <h2>WELCOME TO <br>  </h1> <h2>CARGO LTD WAREHOUSE</h3>
        <div class = "links">
            <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./import.php">Import</a></li>
            <li><a href="./export.php">Export</a></li>
            <li><a href="./Auth/logout.php">logout</a></li>
            </ul>
        </div>
</header>

    <form action="" method="POST">
        <div>
            <label for="fname">Furniture Name</label>
            <input type="text" name="fname" >
        </div>
        <div>
            <label for="pass">Furniture Owner Name</label>
            <input type="text" name="fowner" >
        </div>
        <button type="submit" name="submit">Add</button>
    </form>


    <footer>
    <div class="contact-info">
        <p>Contact Us: info@cargoltd.com | Phone: +123456789</p>
    </div>
    <div class="social-media">
        <a href="#">Facebook</a>
        <a href="#">Twitter</a>
        <a href="#">Instagram</a>
        <!-- Add more social media links as needed -->
    </div>
</footer>

</body>
</html>