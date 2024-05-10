<?php 

include "./Auth/config.php";

$sql = mysqli_query($conn, " SELECT * FROM furniture " );
$tbody = '';
if($sql ==  true){
    $num_rows = mysqli_num_rows($sql);

    if($num_rows > 0){
        $i = 0;
        while($fetch = mysqli_fetch_assoc($sql)){
            $i++;
            $tbody .= '<tr>
                            <td>'.$i.'</td>
                            <td>'.$fetch['furniturename'].'</td>
                            <td>'.$fetch['furnitureownername'].'</td>
                            <td><a href="./f_update.php?id='.$fetch['furnitureid'].'">Update</a></td>
                            <td><a href="./f_delete.php?id='.$fetch['furnitureid'].'">Delete</a></td>
                            <td><a href="./f_import.php?id='.$fetch['furnitureid'].'">Import</a></td>
                        </tr>';
        }
    }else{
        $tbody .= '<tr> <td> No Products </td> </tr>';
    }
}else{
    echo " Not selected ";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Page</title>
    <link rel="stylesheet" href="./style/index.css">
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

    <div class="all">
    <table >
        <thead>
            <tr>
                <th>No</th>
                <th>Furniture Name</th>
                <th>Furniture Owner Name</th>
                <th colspan="3">Action</th>
            </tr><br><br>
            <a id="add" href="./f_add.php">Add</a>
        </thead>

        <tbody>
            <?php echo $tbody; ?>           
        </tbody>
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
    </table>
    </div>


</body>
</html>