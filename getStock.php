<?php
    include 'connection.php';

    $productId = $_GET['product_id'];
    $selectedSize = $_GET['size'];

    function getStockCount($conn, $productId, $selectedSize){
        // Retrieves stock count
        $query = "SELECT stock_quantity FROM product_table WHERE product_id = $productId AND product_size = '$selectedSize'";
        $result = mysqli_query($conn, $query);

        // Throws stock count if successfull
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['stock_quantity'];
        } else {
        return "Error";
        }
    }

    // Call the function to get the stock count
    $stockCount = getStockCount($conn, $productId, $selectedSize);

    // Echo the stock count as the response
    echo $stockCount;
?>