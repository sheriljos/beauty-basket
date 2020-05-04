<?php
    // Environment
    require_once("./components/createEnv.php");

    // Product 
    require_once("./components/product.php");

    // Database
    require_once("./components/CreateDb.php");
    $database = new CreateDb();
    $database->createConnection();
?>