<header id="header">
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
    <button class="navbar-toggler" 
            type="button" 
            data-toggle="collapse" 
            data-target="#navbarTogglerDemo01" 
            aria-controls="navbarTogglerDemo01" 
            aria-expanded="false" 
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <a href="index.php" class="navbar-brand nav-link">
            <h3 class="px-5 nav-icon">
                <i class="fas fa-shopping-basket"></i> Beauty Basket
            </h3>
        </a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 nav-icon">
                        <i class="fas fa-shopping-basket"></i> Basket
                        <?php
                            if (isset($_SESSION['basket'])) {
                                $numberOfProducts = count($_SESSION['basket']);
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$numberOfProducts</span>";
                            }else {
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                            }
                        ?>
                    </h5>
                </a>
            </div>
        </div>
    </nav>

</header>