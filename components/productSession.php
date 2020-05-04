<?php
    // Session
    session_start();

    if (isset($_POST['add'])) {
        $productId = $_POST['productId'];

        if (isset($_SESSION['basket'])) {
            $productIdArray = array_column($_SESSION['basket'], 'productId');

            if (in_array($productId, $productIdArray)) {
                echo "<script>alert('This product is already in basket')</script>";
            } else {
                $_SESSION['basket'][] = [
                    'productId' => $productId
                ];
            }
        }else {
            $_SESSION['basket'][] = [
                'productId' => $productId
            ];
        }
    }
?>