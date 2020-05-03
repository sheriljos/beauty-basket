<?php

class CreateDb
{
    public $serverName;
    public $userName;
    public $password;
    public $dbName;
    public $tableName;
    public $icon;
    public $connection;

    public function __construct()
    {
        $this->serverName = env('DB_HOST');
        $this->userName   = env('DB_USERNAME');
        $this->password   = env('DB_PASSWORD');
        $this->dbName     = env('DB_NAME');
        $this->tableName  = env('DB_TABLE');
    }

    public function createConnection()
    {
        //Connect to the mysqlServer
        $this->connection = $this->getConnection();

        if (!$this->connection) {
            die('Connection failed:' . mysqli_connect_error());
        }

        //Create bb database
        if (mysqli_query($this->connection, $this->getCreateDbQuery())) {
            $this->connection = $this->getConnection(true);

            //Create products table
            if (!mysqli_query($this->connection, $this->getCreateTableQuery())) {
                die('Error in creating table:' . mysqli_error($this->connection));
            } else {
                return false;
            }
        }
    }

    public function getData()
    {
        //Select all products
        $products = mysqli_query($this->connection, $this->getProductsQuery());

        if (!$products) {
            die('Connection failed:' . mysqli_error($this->connection));
        }

        if (mysqli_num_rows($products) <= 0) {
            //TODO: Needs refinement
            echo "No products to display";
            exit();
        }

        return $products;
    }

    public function closeConnection()
    {
        mysqli_close($this->connection);
    }

    private function getConnection($withDatabase = false) 
    {
        return mysqli_connect(
            $this->serverName,
            $this->userName,
            $this->password,
            $withDatabase ? $this->dbName : ''
        );  
    }

    private function getCreateDbQuery()
    {
        return
            "CREATE DATABASE IF NOT EXISTS $this->dbName";
    }

    private function getCreateTableQuery()
    {
        return
            "CREATE TABLE IF NOT EXISTS $this->tableName
            (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                image_path VARCHAR(200),
                image_name VARCHAR(100),
                title VARCHAR(25) NOT NULL,
                description VARCHAR(500),
                actual_price FLOAT,
                selling_price FLOAT
            )";
    }

    private function getProductsQuery()
    {
        return
            "SELECT * FROM $this->dbName.$this->tableName";
    }

}