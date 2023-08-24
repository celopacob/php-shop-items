<?php

    if($_POST) {
        include_once '../../config/database.php';
        include_once 'ShopItem.php';

        $database = new Database();
        $db = $database->getConnection();

        $shop_item = new ShopItem($db);
        $shop_item->id = $_POST['object_id'];

        if($shop_item->delete()) {
            echo "<h4>Object was deleted.</h4>";
        } else {
            echo "<h4>Unable to delete object.</h4>";
        }
    }
?>