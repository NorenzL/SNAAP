<?php
    include 'connection.php';
    
    $Name = "";
    $Type = "";
    $Mat = "";
    $XS = "";
    $S = "";
    $M = "";
    $L = "";
    $XL = "";
    $DuplicationChecker = False;

    $statementChecker = "SELECT * FROM product_table GROUP BY product_name, product_type, product_mat ORDER BY product_id";
    $checkerResult = mysqli_query($conn, $statementChecker);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       
        $Name = $_POST['product_name'];
        $Type = $_POST['product_type'];
        $Mat = $_POST['product_mat'];
        $XS = $_POST['XS_init'];
        $S = $_POST['S_init'];
        $M = $_POST['M_init'];
        $L = $_POST['L_init'];
        $XL = $_POST['XL_init'];
        $newProdDetails = $Name.', '.$Type.', '.$Mat;

        //checks if the Product Name has similar Name in the Database
        while($row = mysqli_fetch_array($checkerResult, MYSQLI_BOTH)){
            $ProductName = $row['product_name'];
            $ProductType = $row['product_type'];
            $ProductMat = $row['product_mat'];
            $ProdDetails= $ProductName.', '.$ProductType.', '.$ProductMat;

            // Displays alert box if a duplicate is detected
            if($newProdDetails == $ProdDetails){
                echo '<script>alert("Duplication found! Product already exist"); window.location.href = "index.php";</script>';
                    $DuplicationChecker = True;
                    break;
            }
        
        }

        // Creates new product if no duplicate is detected
        if($DuplicationChecker == False){

            $query = "INSERT INTO product_table (product_name, product_size, product_mat, product_type, stock_quantity)
                    VALUES('{$Name}', 'Extra Small', '{$Mat}', '{$Type}', $XS),
                    ('{$Name}', 'Small', '{$Mat}', '{$Type}', $S),
                    ('{$Name}', 'Medium', '{$Mat}', '{$Type}', $M),
                    ('{$Name}', 'Large', '{$Mat}', '{$Type}', $L),
                    ('{$Name}', 'Extra Large', '{$Mat}', '{$Type}', $XL)";

            mysqli_query($conn,$query);

            $query2 = "SELECT product_id, product_size, stock_quantity FROM product_table WHERE product_name = '{$Name}' AND product_mat = '{$Mat}' AND product_type = '{$Type}'";
            $result2 = mysqli_query($conn, $query2);

            // Updates transaction history
            while($row1 = mysqli_fetch_array($result2, MYSQLI_BOTH)){
                $id = $row1['product_id'];
                $size = $row1['product_size'];
                $stock = $row1['stock_quantity'];

                $query3 = "INSERT INTO transaction_history_table (product_id, transaction_type, transaction_date, transaction_quantity,  product_details, product_size)
                VALUES($id,'Set Initial Stock', CURRENT_TIMESTAMP(), $stock,'{$newProdDetails}','{$size}')";
                mysqli_query($conn, $query3);
            }
            header("Location: index.php");
        }
        
    }
?>