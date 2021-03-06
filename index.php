<?php
    require_once("autoload.php");

    // Product 
    require_once("./components/product.php");

    // Database
    require_once("./components/CreateDb.php");
    $database = new CreateDb();
    $database->createConnection();

    // Session
    require_once("components/productSession.php");
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
    <div class="container">
        <div class="row text-center py-5">
            <?php
                $products = $database->getData();
                
                while ($product = mysqli_fetch_assoc($products)) {
                    product(
                        $product['id'],
                        $product['image_path'],
                        $product['image_name'],
                        $product['title'],
                        $product['description'],
                        $product['actual_price'], 
                        $product['selling_price']
                    );
                }

                $products->free();
                $database->closeConnection();
            ?>
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