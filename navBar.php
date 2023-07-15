<!-- Left navigation bar-->
<div class = "left-nav">
    <a href = "index.php" class = "logo">
        <img src = "assets/snaapLogo-white.png" class = "logo-img">
    </a>
    
    <!-- Sets value to handle dynamic page title -->
    <ul class = "nav-links">
        <li <?php if ($_SERVER['PHP_SELF'] == '/index.php') echo'class = "active"';?>>
            <a href = "index.php"><i class = "fa-solid fa-shirt"></i><p>Apparels</p></a>
        </li>
        <li <?php if ($_SERVER['PHP_SELF'] == '/addStock.php') echo 'class = "active"'; ?>>
            <a href = "addStock.php"><i class = "fa-regular fa-square-plus"></i><p>Add Stock</p></a>
        </li>
        <li <?php if ($_SERVER['PHP_SELF'] == '/withdrawStock.php') echo 'class = "active"'; ?>>
            <a href = "withdrawStock.php"><i class = "fa-regular fa-square-minus"></i></i><p>Withdraw Stock</p></a>
        </li>
        <li <?php if ($_SERVER['PHP_SELF'] == '/manualCount.php') echo 'class = "active"'; ?>>
            <a href = "manualCount.php"><i class = "fa-solid fa-calculator"></i><p>Manual Count</p></a>
        </li>
        <li <?php if ($_SERVER['PHP_SELF'] == '/transactionHistory.php') echo 'class="active"'; ?>>
            <a href = "transactionHistory.php"><i class = "fa-solid fa-clock-rotate-left"></i><p>Transaction History</p></a>
        </li>
        <div class = "active"></div>
    </ul>
</div>      

<!-- Top navigation bar-->
<div class = "top-nav"> 
    <div class = "hamburger">
        <span></span>
        <span></span> 
        <span></span>  
    </div>
    <div class = "top-menu">
        <div class = "page">
            <?php 
            // Dynamically change page title based on which file is currently used 
                $currentPage = basename($_SERVER['PHP_SELF']);
                switch ($currentPage) {
                    case 'index.php':
                        echo 'Home';
                        break;
                    case 'addStock.php':
                        echo 'Add Stock';
                        break;
                    case 'withdrawStock.php':
                        echo 'Withdraw Stock';
                        break;
                    case 'manualCount.php':
                        echo 'Manual Count';
                        break;
                    case 'transactionHistory.php':
                        echo 'Transaction History';
                        break;
                    default:
                        echo 'Unknown Page';
                        break;
                }
            ?>
        </div>
        <ul>
            <li><a href = "logout.php"><i class = "fa-solid fa-right-from-bracket"></i></a></li>
        </ul>
    </div>
</div>
<div class="overlay"></div>
          