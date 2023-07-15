<?php
    include 'connection.php';

    $Tempid = "";
    $size = "";
    $removeStock = "";
    $name= "";
    $errorMessage = "";
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST){
            //Assign Values to Varable
            $Tempid = $_POST['product_id'];
            $size = $_POST['product_size'];
            $removeStock = $_POST['remove_stock'];
        }
    }

    //Finding the Product's Name
    $query = "SELECT product_name, product_type, product_mat FROM product_table WHERE product_id = $Tempid";
    $result = mysqli_query($conn, $query);
    $value = mysqli_fetch_array($result, MYSQLI_BOTH);

    $name = $value['product_name'];
    $type =$value['product_type'];
    $mat =$value['product_mat'];
    $details = $name.', '.$type.', '.$mat;

    // Catch ID and Quantity using the Product's Name and Size
    $query2 = "SELECT product_id, stock_quantity FROM product_table WHERE product_name = '{$name}' AND product_size = '{$size}';";
    $result2 = mysqli_query($conn, $query2);
    $value2 = mysqli_fetch_array($result2, MYSQLI_BOTH);

    $stockQuantity = $value2['stock_quantity'];
    
    //Checks if the Product has enough stocks to remove 
    if ($removeStock > $stockQuantity) {
        echo '<script>alert("Insufficient stock to withdraw!\n\nProduct stock: ' . $stockQuantity. '\nTrying to withdraw ' . $removeStock . ' stock"); window.location.href = "withdrawStock.php";</script>';

    } else{
    
        $id = $value2['product_id'];

        //Reduce stock
        $totalStock = $value2['stock_quantity'] - $removeStock;

        //Commit reduction
        $query3 = "UPDATE product_table SET stock_quantity = $totalStock WHERE product_id = $id";
        $result3 = mysqli_query($conn, $query3);

        //Add transaction to Transaction History
        $query4 = "INSERT INTO transaction_history_table (product_id, transaction_type, transaction_date, transaction_quantity, product_details, product_size) 
                    VALUES($id,'Withdraw Stock', CURRENT_TIMESTAMP(),$removeStock,'{$details}','{$size}')";
            
        mysqli_query($conn, $query4);

        header("Location: withdrawStock.php");
    }
?>