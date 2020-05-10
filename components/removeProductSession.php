<?php
    // Session
    session_start();

    if (isset($_GET['remove'])) {
        $productArrayIndex = array_search(['productId' => $_GET['remove']], $_SESSION['basket']);


        if ($productArrayIndex >= 0) {
            unset($_SESSION['basket'][$productArrayIndex]);

            echo "<script>alert('Product is successfully removed from your basket')</script>";
        } else {
            echo "<script>alert('No product is found')</script>";
        }
    }
?>