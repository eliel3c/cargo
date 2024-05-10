<?php 


include_once "./Auth/config.php";

$id = $_GET['id'];
$sql = mysqli_query($conn, " SELECT * FROM furniture WHERE furnitureid = '{$id}' " );

if($sql == true){
    $fetch = mysqli_fetch_assoc($sql);

    $form = '<form action="" method="POST">
                <div>
                    <label for="uname">Furniture Name</label>
                    <input type="text" name="fname" value="'.$fetch['furniturename'].'" disabled >
                </div>
                <div>
                    <label for="pass">Furniture Owner Name</label>
                    <input type="text" name="fowner" value="'.$fetch['furnitureownername'].'" disabled >
                </div>
                <div>
                    <label for="pass">Date</label>
                    <input type="date" name="date" >
                </div>
                <div>
                    <label for="pass">Quantity</label>
                    <input type="text" name="quantity" >
                </div>
                <button type="submit" name="submit">Import</button>
            </form>';

}
if(isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];

    $check = mysqli_query($conn,"SELECT * FROM import WHERE furnitureid = '{$id}'");
    if(mysqli_num_rows($check) > 0){
        $fetch = mysqli_fetch_assoc($check);
        $new_quantity = $fetch['quantity'] + $quantity;

        $sql = mysqli_query($conn, " UPDATE import SET importdate = '{$date}' , quantity = '{$new_quantity}' WHERE furnitureid='{$id}' ");
        if($sql == true){
            echo "Record added! <a href='./import.php'>View import</a>";
        }else{
            echo "Record not added";
        }
    }else{
        $sql = mysqli_query($conn,"INSERT INTO import(furnitureid,importdate,quantity) VALUES('{$id}','{$date}','{$quantity}')");
        if($sql == true){
            echo "Record added! <a href='./import.php'>View import</a>";
        }else{
            echo "Not Added";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/f_import.css">
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

    <?php echo $form; ?>


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