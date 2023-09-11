<?php
    require_once "config/core.php";
    require_once APP_ROOT . "/src/controllers/ShopItemController.php";

    $controller = new ShopItemController($db);
    $controller->handleRequest();
?>