<?php

function product($productId, $imagePath, $imageName, $productTitle, $productDesciption, $actualPrice, $sellingPrice) {
    $element = "
    <div class='col-md-3 col-sm-6 my-3 my-md-0'>
        <form action='index.php' method='post'>
            <div class='card shadow'>
                <div class='image-container'>
                    <img src=$imagePath alt=$imageName class='img-fluid card-img-top'>
                </div>
                <div class='card-body'>
                    <h5 class='card-title'>$productTitle</h5>
                    <h6>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='far fa-star'></i>
                    </h6>
                    <p class='card-text'>
                        $productDesciption
                    </p>
                    <h5>
                        <span><s class='text-secondary'>$$actualPrice</s></span>
                        <span class='price'>$$sellingPrice</span>
                    </h5>
                    <button type='submit' name='add' class='btn btn-info my-3'>Add to Basket <i
                            class='fas fa-shopping-basket'></i></button>
                    <input type='hidden' name='productId' value=$productId>
                </div>
            </div>
        </form>
    </div>
    ";

    echo $element;
}