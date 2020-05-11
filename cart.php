<?php
    //Auto load environment variables
    require_once("autoload.php");

    // Session
    require_once("components/removeProductSession.php");

    // cart elements
    require_once('./components/cartElement.php');

    // Database
    require_once("./components/CreateDb.php");
    $database = new CreateDb();
    $database->createConnection();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Beauty Basket</title>

    <!-- Custom styling -->
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
</head>

<body>
    <?php
        include('./components/header.php')
    ?>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h4>My Cart</h4>
                    <hr>
                    <?php
                        $products = $database->getData();
                        $selectedItemsIds = array_column($_SESSION['basket'], 'productId');
                        $total = 0;

                        if (count($selectedItemsIds) > 0) {
                            while ($product = mysqli_fetch_assoc($products)) {
                                foreach ($selectedItemsIds as $selectedItemsId) {
                                    if ($selectedItemsId === $product['id']) {
                                        cartElement(
                                            $product['id'],
                                            $product['image_path'],
                                            $product['image_name'],
                                            $product['title'],
                                            $product['selling_price']
                                        );

                                        $total = $total + $product['selling_price'];
                                    }
                                }
                            }
            
                            $products->free();
                            $database->closeConnection();
                        } else {
                            echo '<div class="alert alert-info" role="alert">
                                    Empty Basket! Fill it with some goodies...
                                </div>';
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-5 py-10">
                <div class="pt-4">
                        <h6>PRICE DETAILS</h6>
                        <hr>
                        <div class="row price-details">
                            <div class="col-md-6">
                                <?php
                                    if (isset($_SESSION['basket'])) {
                                        $count = count($_SESSION['basket']);
                                        echo "<h6>Price ($count items)</h6>";
                                    } else {
                                        echo "<h6>Price (0 items)</h6>";
                                    }
                                ?>
                                <h6>Delivery Charges</h6>
                                <hr>
                                <h6>Amount Payable</h6>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    if (isset($_SESSION['basket'])) {
                                        echo "<h6>$$total</h6>";
                                    } else {
                                        echo "<h6>$0</h6>";
                                    }
                                ?>
                                <h6 class="text-success">FREE</h6>
                                <hr>
                                <?php
                                    if (isset($_SESSION['basket'])) {
                                        echo "<h6>$$total</h6>";
                                    } else {
                                        echo "<h6>$0</h6>";
                                    }
                                ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>