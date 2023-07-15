<?php
    $condition = "";
    $keyword = "";
 
    // Searches the database using product's name, material, or type
    if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $condition = "WHERE product_name LIKE '%$keyword%' OR product_mat LIKE '%$keyword%' OR product_type LIKE '%$keyword%'";
    }
?>