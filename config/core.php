<?php

    define('APP_ROOT', dirname(dirname(__FILE__)));
    define('URL_ROOT', '/');

    require_once APP_ROOT . "/config/database.php";

    $database = new Database();
    $db = $database->getConnection();

?>