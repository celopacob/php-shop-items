<?php
    $page_title = "Shop Items";
    include_once "templates/header.php";
    include_once 'config/database.php';
    require_once "src/ShopItem/ShopItem.php";

    $database = new Database();
    $db = $database->getConnection();
    $shop_item = new ShopItem($db);
    $result = $shop_item->getAll();

    include_once "src/ShopItem/list.php";
    include_once "templates/footer.php";

    //TO-DO: Change all templates to a frontend app
?>