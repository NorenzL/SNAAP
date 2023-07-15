<?php
    include 'connection.php';

    $Tempid = "";
    $size = "";
    $addStock = "";
    $name = "";
  
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST){
            //Assign Values to Varable
            $Tempid = $_POST['product_id'];
            $size = $_POST['product_size'];
            $addStock = $_POST['add_stock'];
        }
    }

    //Searches Product name
    $query = "SELECT product_name, product_type, product_mat FROM product_table WHERE product_id = $Tempid";
    $result = mysqli_query($conn, $query);
    $value = mysqli_fetch_array($result, MYSQLI_BOTH);
        
    $name = $value['product_name'];
    $type =$value['product_type'];
    $mat =$value['product_mat'];
    $details = $name.', '.$type.', '.$mat;

    //Catches Product id and Stock thru Product Name and Size
    $query2 = "SELECT product_id, stock_quantity FROM product_table WHERE product_name = '{$name}' AND product_type = '{$type}' AND product_mat = '{$mat}' AND product_size = '{$size}';";
    $result2 = mysqli_query($conn, $query2);
    $value2 = mysqli_fetch_array($result2, MYSQLI_BOTH);

    $id = $value2['product_id'];

    //Adds unto the Stock
    $totalStock = $value2['stock_quantity'] + $addStock;

    //Commit Additions
    $query3 = "UPDATE product_table SET stock_quantity = $totalStock WHERE product_id = $id";
    $result3 = mysqli_query($conn, $query3);
        
    //Add transaction made to transaction history
    $query4 = "INSERT INTO transaction_history_table (product_id, transaction_type, transaction_date, transaction_quantity,  product_details, product_size) 
                    VALUES($id,'Add Stock', CURRENT_TIMESTAMP(),$addStock,'{$details}','{$size}')";
        
    mysqli_query($conn, $query4);
     
    header('location: addStock.php');
?>