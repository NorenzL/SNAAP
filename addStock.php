<?php
    include 'authentication.php';
    include 'connection.php';
    include 'searchFunction.php';
    authenticate();

    $product_id = "";
    $product_size = "";
    $add_stock = "";

    $statement = "SELECT product_id, product_name, product_size,stock_quantity, product_mat, product_type, SUM(stock_quantity) AS stock
    FROM product_table $condition GROUP BY product_name, product_type, product_mat  ORDER BY product_id";
    $productResult = mysqli_query($conn, $statement);
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <link rel = "stylesheet" href = "css/style.css">
        <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>Add Stock</title>
        <link rel = "icon" href = "assets/snaapLogo-white.png">
        <script src = "https://kit.fontawesome.com/e350c253ed.js" crossorigin = "anonymous"></script>
    </head>
    <body>

        <div class = "header">
            <!-- Navigation Bar -->
            <?php include 'navBar.php'; ?>

            <!--Add Stock Content-->
            <div class = "main_container">
                <!-- Search Field -->
                <div class = "table_container" style = "background-color: transparent; margin-top: 0;">
                    <form class = "searchButtons" method = "GET" style = "margin: 20px; padding: 0; width: 70%; " style = "display: flex; align-items: center; position: relative;">
                        <div class = "leftButton">
                            <button type = "submit" style = "background: none; border: none;">
                                <img src = "assets/magniGlass.png" style = "width: 20px; height: 20px; position: absolute; transform: translate(7px,70%); cursor: pointer;">
                            </button>

                            <input type = "text" placeholder = "Quick search" name = "keyword" value = "<?php echo $keyword;?>" style = "width: 100%; padding: 5px; padding-left: 30px; flex: 1; background-color: transparent;">
                        </div>
                        <!-- Cross button -->
                        <?php
                            if(isset($_GET['keyword']) && !empty($_GET['keyword'])) {
                                echo '
                                    <div class = "RightButton">
                                        <label></label>
                                        <a href = "addStock.php">
                                            <img src = "assets/cross.png" style = "width: 50px; height: 50px; position: absolute; transform: translate(1px,30%); cursor: pointer;"> 
                                        </a>
                                    </div>
                                ';
                            }
                        ?>
                    </form>
                </div>

                <div class = "apparels_container">
                    <?php
                        // Dynamically display all products
                        while($row = mysqli_fetch_array($productResult, MYSQLI_BOTH)){
                            if(file_exists('assets/' . $row['product_name'] . '_' . $row['product_type'] . '_' . $row['product_mat'] . '.png')){
                                $productSprite = 'assets/' . $row['product_name'] . '_' . $row['product_type'] . '_' . $row['product_mat'] . '.png';
                            } else {
                                if($row['product_type']=='T-Shirt'){$productSprite = 'assets/default-shirt.png';}
                                else if($row['product_type']=='Polo'){$productSprite = 'assets/default-polo.png';}
                                else if($row['product_type']=='Jacket'){$productSprite = 'assets/default-jacket.png';}
                                else if($row['product_type']=='SweatShirt'){$productSprite = 'assets/default-sweatshirt.png';}
                            }

                            echo '<!-- Products -->
                                <div class = "clothing box" style = "width: 100%; cursor: pointer;" onclick = "togglePopup(' . $row['product_id'] . ')">
                                    <img src = ' . $productSprite . '>
                                    <div class = "name">' . $row['product_name'] . '</div>
                                    <div class = "fabric">' . $row['product_mat'] . ', ' . $row['product_type'] . '</div>
                                    <div class = "avail_stocks">Total Stocks: ' . $row['stock'] . '</div>
                                    
                                    <label for = "show ' . $row['product_id'] . '">

                                        <select name = "size" class = "my-dropdown white" onchange = "updateStockCount(this, ' . $row['product_id'] . ')" onclick = "stopPopup(event)">
                                            <option value = "Extra Small" data-product-id = "' . $row['product_id'] . '">XS</option>
                                            <option value = "Small" data-product-id = "' . $row['product_id'] + 1 . '">Small</option>
                                            <option value = "Medium" data-product-id = "' . $row['product_id'] + 2 . '">Medium</option>
                                            <option value = "Large" data-product-id = "'. $row['product_id'] + 3 . '">Large</option>
                                            <option value = "Extra Large" data-product-id = "' . $row['product_id'] + 4 . '">XL</option>
                                        </select>

                                        <div class = "avail_stocks" id = "stock ' . $row['product_id'] . '">Stock: '. $row['stock_quantity'].'</div>
                                    </label>
                                </div>
                                <!-- Add stock popup -->
                                <div class = "container" id = "container ' . $row['product_id'] . '" style = "position: fixed; height: 430px; display: none;">
                                    <form method = "post" action = "import.php" style = "width:100%; margin-top: 0;">
                                        <input type = "hidden" name = "product_id" value = "' . $row['product_id'] . '">
                                        <label for = "show ' . $row['product_id'] . '" class = "close-btn fas fa-times" title = "close" onclick = "closePopup(' . $row['product_id'] . ')"></label>
                                        
                                        <div class = "text">
                                            <h2>Add Stock</h2>
                                            <center><h4>' . $row['product_name'] . '</h4></center>
                                            <div class = "stock-group">
                            
                                                <label for = "productDescription ' . $row['product_id'] . '">Size:</label>
                                                <select class = "stock-dropdown white" name = "product_size">
                                                    <option value = "Extra Small" data-product-id = "' . $row['product_id'] . '">XS</option>
                                                    <option value = "Small" data-product-id = "' . $row['product_id'] + 1 . '">Small</option>
                                                    <option value = "Medium" data-product-id = "' . $row['product_id'] + 2 . '">Medium</option>
                                                    <option value = "Large" data-product-id = "' . $row['product_id'] + 3 . '">Large</option>
                                                    <option value = "Extra Large" data-product-id = "' . $row['product_id'] + 4 . '">XL</option>
                                                </select>
                                            </div>

                                            <div class = "stock-group" style = "height: 82px;">
                                                <label for = "productDescription ' . $row['product_id'] . '">Quantity:</label>
                                                <div>
                                                    <input type = "number" name = "add_stock" min = "1" value = ' . $add_stock . '>
                                                </div>

                                                <p class = "errorMessage" style = "color: red; font-size: 16px;"></p>

                                            </div>

                                            <div class = "checkbox-container" style = "margin-top: 50px;">
                                                <input type = "checkbox" id = "confirmationCheckbox' . $row['product_id'] . '">
                                                <label for = "confirmationCheckbox' . $row['product_id'] . '"> Do you confirm ?</label>
                                            </div>

                                            <div class = "button-container">
                                                <button a href = "addStock.php" class = "save-button" onclick = "validateInput(event)">Add</button>
                                                <button class = "cancel-button" onclick = "closePopup(' . $row['product_id'] . '); event.preventDefault();">Cancel</button> 
                                            </div>
                                        </div>
                                    </form> 
                                </div>
                            '; 
                        }
                    ?>
                </div>
            </div>
        </div>
        <script src = "js/script.js"> </script>
    </body>
</html>