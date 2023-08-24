<?php
    include_once '../../config/database.php';
    include_once './ShopItem.php';

    $database = new Database();
    $db = $database->getConnection();
    $shop_item = new ShopItem($db);
?>