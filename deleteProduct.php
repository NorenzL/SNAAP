<?php
    include 'connection.php';

    $name;
    $type;
    $mat;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $name = $_POST['product_name'];
        $type = $_POST['product_type'];
        $mat = $_POST['product_mat'];

        $query = "DELETE FROM product_table WHERE product_name = '{$name}' AND product_type = '{$type}' AND product_mat = '{$mat}'";
        mysqli_query($conn, $query);

        header('location: index.php');
        
    }
?>