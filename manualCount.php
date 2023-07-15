<?php
    include 'connection.php';
    include 'authentication.php';
    authenticate();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'manualCount') === 0) {
                $productId = substr($key, strlen('manualCount'));
                $manualCount = $_POST[$key];

                // Retrieve the Product's name, size and current stock quantity
                $query = "SELECT stock_quantity, product_name, product_size, product_type, product_mat FROM product_table WHERE product_id = $productId";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $currentQuantity = $row['stock_quantity'];
                $name = $row['product_name'];
                $size = $row['product_size'];
                $type = $row['product_type'];
                $mat = $row['product_mat'];
                $details = $name.', '.$type.', '.$mat;

                // Update the stock quantity if it's different from the manual count
                if ((!empty($manualCount) || $manualCount === '0') && $manualCount !== $currentQuantity) {

                    $query = "UPDATE product_table SET stock_quantity = $manualCount WHERE product_id = $productId";
                    mysqli_query($conn, $query);

                    // Update the transaction history
                    $transactionType = $manualCount > $currentQuantity ? 'Recount Stock (Add)' : 'Recount Stock (Reduce)';
                    $transactionQuantity = abs($manualCount - $currentQuantity);
            
                    $query2 = "INSERT INTO transaction_history_table (product_id, transaction_type, transaction_date, transaction_quantity, product_details, product_size) 
                                VALUES ($productId, '$transactionType', CURRENT_TIMESTAMP(), $transactionQuantity,'{$details}','{$size}')";

                    mysqli_query($conn, $query2);
                }
            }
        }      
    }

    $condition = "";
    $keyword = "";

    if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $condition = "WHERE product_name LIKE '%$keyword%' OR product_mat LIKE '%$keyword%' OR product_type LIKE '%$keyword%' OR product_size LIKE '%$keyword%'";
    }
    $query3 = "SELECT * FROM product_table $condition ORDER BY product_id";
  
    $queryResults = mysqli_query($conn, $query3);
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <link rel = "stylesheet" href = "css/style.css">
        <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>Manual Count</title>
        <link rel = "icon" href = "assets/snaapLogo-white.png">
        <script src = "https://kit.fontawesome.com/e350c253ed.js" crossorigin = "anonymous"></script>
    </head>
    <body>
        <div class="header">
            <!-- Navigation Bar -->
            <?php include 'navBar.php'; ?>
        
            <!--Manual Count Content-->
            <div class = "main_container_index">
                <div class = "table_container">
                    <!-- Search field -->
                    <form class = "searchButtons" method = "GET" style = "margin: 0; padding: 0; width: 70%;" style = "display: flex; align-items: center; position: relative;">
                        <div class = "leftButton">
                            <button type = "submit" style = "background: none; border: none;">
                                <img src = "assets/magniGlass.png" style = "width: 20px; height: 20px; position: absolute; transform: translate(7px,70%); cursor: pointer;">
                            </button>
        
                            <input type = "text" placeholder = "Quick search" name = "keyword" value = "<?php echo $keyword;?>" style = "width: 100%; padding: 5px; padding-left: 30px; flex:1;">
                        </div>

                        <?php
                            // Cross Button
                            if(isset($_GET['keyword']) && !empty($_GET['keyword'])) {
                                echo '
                                    <div class ="RightButton">
                                        <label></label>
                                        <a href ="manualCount.php">
                                            <img src = "assets/cross.png" style="width: 50px; height: 50px; position: absolute; transform: translate(1px,30%); cursor:pointer;"> 
                                        </a>
                                    </div>
                                ';
                            }
                        ?>
                    </form>

                    <form method="POST">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Detail</th>
                                    <th>Size</th>
                                    <th>Current Quantity</th>
                                    <th>Manual Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Contents -->
                                <?php
                                    while ($row = mysqli_fetch_array($queryResults, MYSQLI_BOTH)) {
                                        $productId = $row['product_id'];
                                        $name = $row['product_name'];
                                        $type = $row['product_type'];
                                        $mat = $row['product_mat'];
                                        $details = $name.', '.$type.', '.$mat;                        
                                        $size = $row['product_size'];
                                        $currentQuantity = $row['stock_quantity'];
                                ?>
                                <tr>
                                    <td><?php echo $productId; ?></td>
                                    <td><?php echo $details; ?></td>
                                    <td><?php echo $size; ?></td>
                                    <td><?php echo $currentQuantity; ?></td>
                                    <td><input type = "number" name = "manualCount<?php echo $productId; ?>" min = "0" style = "background-color: transparent; border: none; border-bottom: 1px solid black; width: 50px; text-align: center; font-size: 16px; transform: translate(-5px);"></td>

                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>

                        <div class="checkButton">
                            <button type = "submit" class = "save-button">Check</button>
                        </div>
                    </form>
                </div>
            </div>  
        </div> 

        <script src = "js/script.js"></script>
    </body>
</html>