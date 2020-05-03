<?php
    require_once("./components/createEnv.php");
    require_once("./components/product.php");
    require_once("./components/CreateDb.php");

    $database = new CreateDb();
    $database->createConnection();
?>