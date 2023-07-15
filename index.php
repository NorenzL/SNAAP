<?php
    include 'authentication.php';
    include 'connection.php';
    include 'searchFunction.php';
    authenticate();

    $product_name = "";
    $product_type = "";
    $product_mat = "";
    $product_price = "";
    $XS = "";
    $S = "";
    $M = "";
    $L = "";
    $XL = "";
   
    $statement = "SELECT product_id, product_name, product_size,stock_quantity, product_mat, product_type, SUM(stock_quantity) AS stock
    FROM product_table $condition GROUP BY product_name, product_type, product_mat ORDER BY product_id DESC";
    $productResult = mysqli_query($conn, $statement);
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "css/style.css">
        <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>SNAAP Apparel</title>
        <link rel = "icon" href = "assets/snaapLogo-white.png">
        <script src = "https://kit.fontawesome.com/e350c253ed.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="header">
            <!-- Navigation Bar -->
            <?php include 'navBar.php'; ?>

            <!-- CONTENTS -->
            <div class = "main_container_index">

                <!-- New Product Button -->
                <div class = "top-menu add">
                    <input type = "checkbox" id = "show">
                    <?php
                        echo'
                        <label for = "show" class = "addproduct_btn"';
                        // Hides new product button if logged in user does not have permission to add product
                        if ($_SESSION['username'] !== 'management') {
                            echo' style = "display: none" margin-top: 5%;"';
                        }
                        echo'
                        style = "margin-top: 1%;"><i class = "fas fa-plus"></i>New Product</label>';
                    ?>
                    <!-- New Product Popup -->
                    <div class = "AddContainer" id = "AddContainer"style = "position: fixed; z-index: 1; height: 570px; display: none;">
                        <label for = "show" class = "close-btn fas fa-times" title = "close"></label>
                        <div class = "text">
                            <form method = "post" action = "create.php">
                                <center><h2>Add New Product</h2></center>

                                <div class = "form-group">
                                    <label for = "productName">Product Name:</label>
                                    <input type = "text" id = "productName" name = "product_name" required value = "<?php echo $product_name;?>" >
                                </div>

                                <div class = "form-group">
                                    <label for = "productDescription">Product Material:</label>
                                    <select class = "dropdown white" name = "product_mat" required style = " width: 465px;">
                                        <option value = "Cotton">Cotton</option>
                                        <option value = "Polyester">Polyester</option>
                                        <option value = "Spandex">Spandex</option>
                                        <option value = "Fleece">Fleece</option>
                                    </select>
                                </div>

                                <div class = "form-group">
                                    <label for = "productPrice">Product Type:</label>
                                    <select class = "dropdown white" name = "product_type" required style = " width: 465px;">
                                        <option value = "T-Shirt">T-Shirt</option>
                                        <option value = "Polo">Polo</option>
                                        <option value = "Jacket">Jacket</option>
                                        <option value = "SweatShirt">SweatShirt</option>
                                    </select>
                                </div>

                                <label for = "productPrice"><b>Set Initial Stock:</b></label>
                            <table>    
                                <tbody >
                                <tr>
                                    <th style="border-bottom: none">XS</th>
                                    <th style="border-bottom: none">S</th>
                                    <th style="border-bottom: none">M</th>
                                    <th style="border-bottom: none">L</th>
                                    <th style="border-bottom: none">XL</th>
                                </tr>
                                </tbody>
                                <tbody >
                                    <tr>
                                        <th style="border-bottom: none"><input type = "number" name = "XS_init" min = "0" value = $XS style = "background-color: transparent; border: none; border-bottom: 1px solid black; width: 50px; text-align: center; font-size: 16px; transform: translate(-5px);" required></th>
                                        <th style="border-bottom: none"><input type = "number" name = "S_init" min = "0" value = $S style = "background-color: transparent; border: none; border-bottom: 1px solid black; width: 50px; text-align: center; font-size: 16px; transform: translate(-5px);" required></th>
                                        <th style="border-bottom: none"><input type = "number" name = "M_init" min = "0" value = $M style = "background-color: transparent; border: none; border-bottom: 1px solid black; width: 50px; text-align: center; font-size: 16px; transform: translate(-5px);" required></th>
                                        <th style="border-bottom: none"><input type = "number" name = "L_init" min = "0" value = $L style = "background-color: transparent; border: none; border-bottom: 1px solid black; width: 50px; text-align: center; font-size: 16px; transform: translate(-5px);" required></th>
                                        <th style="border-bottom: none"><input type = "number" name = "XL_init" min = "0" value = $XL style = "background-color: transparent; border: none; border-bottom: 1px solid black; width: 50px; text-align: center; font-size: 16px; transform: translate(-5px);" required></th>
                                    </tr>
                                </tbody>
                            </table>

                                <div class = "button-container">
                                    <button class = "save-button" style = "width: 100px;">Add</button>
                                    <button class = "cancel-button">Cancel</button> 
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Search Field -->
                <div class = "apparels_container">
                    <div class = "table_container" style = "background-color: transparent; margin-top: 0;">

                        <?php
                            if($_SESSION['username'] !== 'management'){

                                echo '
                                    <form class = "searchButtons" method = "GET" style = "margin-top: -30px; margin-bottom: 30px; padding: 0; width: 70%; " style = "display: flex; align-items: center; position: relative;">
                                ';
                            }
                            else{

                                echo '
                                    <form class = "searchButtons" method = "GET" style = "margin-top:-20px; padding: 0; width: 70%; " style = "display: flex; align-items: center; position: relative;">
                                ';
                            }
                        ?>
                            <div class = "leftButton">
                                <button type = "submit" style = "background: none; border: none;">
                                    <img src = "assets/magniGlass.png" style = "width: 20px; height: 20px; position: absolute; transform: translate(7px,70%); cursor: pointer;">
                                </button>

                                <input type = "text" placeholder = "Quick search" name = "keyword" value = "<?php echo $keyword;?>" style = "width: 100%; padding: 5px; padding-left: 30px; flex:1; background-color: transparent;">
                            </div>
                            <!-- Cross button -->
                            <?php
                                if(isset($_GET['keyword']) && !empty($_GET['keyword'])) {
                                    echo '
                                        <div class ="RightButton">
                                            <label></label>
                                            <a href ="index.php">
                                                <img src = "assets/cross.png" style="width: 50px; height: 50px; position: absolute; transform: translate(1px,30%); cursor:pointer;"> 
                                            </a>
                                        </div>
                                    ';
                                }
                            ?>
                        </form>
                    </div>
                    <?php
                        // Dynamically display all products
                        while($row = mysqli_fetch_array($productResult, MYSQLI_BOTH)){
                            if(file_exists('assets/' . $row['product_name'] . '_' . $row['product_type'] . '_' . $row['product_mat'] . '.png')){
                                $productSprite = 'assets/' . $row['product_name'] . '_' . $row['product_type'] . '_' . $row['product_mat'] . '.png';
                            } else{
                                if($row['product_type']=='T-Shirt'){$productSprite = 'assets/default-shirt.png';}
                                else if($row['product_type']=='Polo'){$productSprite = 'assets/default-polo.png';}
                                else if($row['product_type']=='Jacket'){$productSprite = 'assets/default-jacket.png';}
                                else if($row['product_type']=='SweatShirt'){$productSprite = 'assets/default-sweatshirt.png';}
                            }

                            echo '
                                <!-- Products -->
                                <div class = "clothing box">
                                
                                    <label for = "show ' . $row['product_id'] . '" class = "close-btn fas fa-times" title = "close" id = "deleteButton"';
                                    if ($_SESSION['username'] !== 'management') {
                                        echo ' style="display: none;"'; // Hides delete button if logged in user does not have permission to delete product
                                    }
                        
                                    echo ' onclick = "togglePopup(' . $row['product_id'] . ')"></label>
                                    <img src = ' . $productSprite . '>
                                    <div class = "name">' . $row['product_name'] . '</div>
                                    <div class = "fabric">' . $row['product_mat'] . ', ' . $row['product_type'] . '</div>
                                    <div class = "avail_stocks">Total Stocks: ' . $row['stock'] . '</div>
                                    <select name = "size" class = "my-dropdown white" onchange = "updateStockCount(this, ' . $row['product_id'] . ')">
                                        <option value = "Extra Small" data-product-id = "' . $row['product_id'] . '">XS</option>
                                        <option value = "Small" data-product-id = "' . $row['product_id'] + 1 . '">Small</option>
                                        <option value = "Medium" data-product-id = "' . $row['product_id'] + 2 . '">Medium</option>
                                        <option value = "Large" data-product-id = "'. $row['product_id'] + 3 . '">Large</option>
                                        <option value = "Extra Large" data-product-id = "' . $row['product_id'] + 4 . '">XL</option>
                                    </select>
                                    <div class = "avail_stocks" id = "stock ' . $row['product_id'] . '">Stock: ' . $row['stock_quantity'] . '</div>
                                </div>

                                <!-- Delete Popup -->
                                <div class = "container" id = "container ' . $row['product_id'] . '" style = "position: fixed; height: 245px; display: none;">
                                    <form method = "post" action = "deleteProduct.php" style = "width:100%; margin-top: 0;">
                                        <input type = "hidden" name = "product_type" value = "'. $row['product_type'] . '">
                                        <input type = "hidden" name = "product_mat" value = "'. $row['product_mat'] . '">
                                        <input type = "hidden" name = "product_name" value = "'. $row['product_name'] . '">
                                        <input type = "checkbox" id = "show ' . $row['product_id'] . '" name = "product_id" value ="' . $row['product_id'] . '">
                                        <label for = "show ' . $row['product_id'] . '" class = "close-btn fas fa-times" title = "close" onclick = "closePopup(' . $row['product_id'] . ')"></label>
                                    
                                        <div class = "text">
                                            <h2>Delete Product</h2>
                                            <center><i><h3>"' . $row['product_name'] . '"</h3></i></center>

                                            <div class = "checkbox-container" style = "margin-top: 25px;">
                                                <input type = "checkbox" id = "confirmationCheckbox' . $row['product_id'] . '">
                                                <label for = "confirmationCheckbox' . $row['product_id'] . '"> Are you sure ?</label>
                                            </div>

                                            <div class = "button-container">
                                                <button a href = "index.php"class = "save-button" style = "width: 61px;">Yes</button>
                                                <button class = "cancel-button" onclick = "closePopup(' . $row['product_id'] . '); event.preventDefault();">No</button> 
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