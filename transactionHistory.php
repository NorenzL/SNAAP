<?php
    include 'authentication.php';
    include 'connection.php';
    authenticate();

    $condition = "";
    $keyword = "";
 
    if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $condition = "WHERE product_details LIKE '%$keyword%' OR transaction_date LIKE '%$keyword%' 
        OR transaction_type LIKE '%$keyword%' OR product_id LIKE '$keyword'";
    }

    $query = "SELECT product_id, product_details, product_size,
    transaction_type, transaction_quantity, transaction_date
    FROM transaction_history_table $condition 
    ORDER BY transaction_id DESC";
   
    $queryResult = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <link rel = "stylesheet" href = "css/style.css">
        <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>Transaction History</title>
        <link rel = "icon" href = "assets/snaapLogo-white.png">
        <script src = "https://kit.fontawesome.com/e350c253ed.js" crossorigin = "anonymous"></script>
    </head>
    <body>
        <div class = "header">
            <?php include 'navBar.php'; ?>
      
            <!--History Content-->
            <div class = "main_container_index">
                <div class = "table_container">
                    <form class = "searchButtons" method = "GET" style = "margin: 0; padding: 0; width: 70%;" style = "display: flex; align-items: center; position: relative;">
                        <div class = "leftButton">
                            <button type = "submit" style = "background: none; border: none;">
                                <img src = "assets/magniGlass.png" style = "width: 20px; height: 20px; position: absolute; transform: translate(7px,70%); cursor: pointer;">
                            </button>
                
                            <input type = "text" placeholder = "Quick search" name = "keyword" value = "<?php echo $keyword;?>" style = "width: 100%; padding: 5px; padding-left: 30px; flex: 1;">
                        </div>
                        <?php
                            if(isset($_GET['keyword']) && !empty($_GET['keyword'])) {
                                echo '
                                    <div class = "RightButton">
                                        <label></label>
                                        <a href = "transactionHistory.php">
                                            <img src = "assets/cross.png" style = "width: 50px; height: 50px; position: absolute; transform: translate(1px,30%); cursor: pointer;"> 
                                        </a>
                                    </div>
                                ';
                            }
                        ?>
                    </form>
        
                    <table>
                        <thead>
                            <tr>
                                <th style = "width: 13%;">Product ID</th>
                                <th style = "width: 18%; padding-right: .3%">Details</th>
                                <th style = "width: 8%;">Size</th>
                                <th style = "width: 15%; padding-left: 8%;">Transaction Type</th>
                                <th style = "width: 5%;">Transaction Quantity</th>
                                <th style = "width: 30%;">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = mysqli_fetch_array($queryResult, MYSQLI_BOTH)) {
                                    $productId = $row['product_id'];
                                    $details = $row['product_details'];
                                    $size = $row['product_size'];
                                    $trans = $row['transaction_type'];
                                    $transQuantity = $row['transaction_quantity'];
                                    $transDate = $row['transaction_date'];
                                    echo '
                                        <tr>
                                            <td style="width: 13%; padding-left: 7%;">' . $productId . '</td>
                                            <td style="width: 18%;">' . $details . '</td>
                                            <td style="width: 8%; padding-left: 5%;">' . $size . '</td>
                                            <td style="width: 15%; padding-right: 10%;">' . $trans . '</td>
                                            <td style="width: 5%;">' . $transQuantity . '</td>
                                            <td style="width: 30%; padding-left: 11.5%;">' . $transDate . '</td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>   
        </div>
        <script src = "js/script.js"></script>
    </body>

</html>