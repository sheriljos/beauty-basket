<?php

function cartElement($productId, $imagePath, $imageName, $productName, $sellingPrice) {
    $element = "
    <form action='cart.php' method='GET' class='cart-items'>
        <div class='border rounded'>
            <div class='row bg-white'>
                <div class='col-md-3'>
                    <img src=$imagePath alt=$imageName class='img-fluid pt-1'>
                </div>
                <div class='col-md-6 my-1'>
                    <h5 class='pt-2'>$productName</h5>
                    <small class='text-secondary'>Seller: Sheril</small>
                    <h5 class='pt-2'>$$sellingPrice</h5>
                    <button type='submit' class='btn btn-warning'>Save for later</button>
                    <button type='submit' class='btn btn-danger mx-2' name='remove' value=$productId>Remove</button>
                </div>
                <div class='col-md-3'>
                <div class='py-5'>
                    <button type='button' class='btn bg-light border rounded-circle'>
                        <i class='fas fa-minus'></i>
                    </button>
                    <input type='text' value='1' class='form-control w-25 d-inline text-center'>
                    <button type='button' class='btn bg-light border rounded-circle'>
                        <i class='fas fa-plus'></i>
                    </button>
                </div>
                </div>
            </div>
        </div>
    </form>
    ";

    echo $element;
}