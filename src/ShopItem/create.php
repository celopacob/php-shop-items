<?php
    include_once "../../config/core.php";

    if ($_POST) {
        try {
            $shop_item->description = isset($_POST['description']) && $_POST['description']!= ''? $_POST['description']:null;
            $shop_item->checked = isset($_POST['checked'])? $_POST['checked'] : 0;

            if($shop_item->description != null) {
                $shop_item->create();
                echo "<div class='alert alert-success'>Item created.</div>";
            } else {
                echo "<div class='alert alert-info'>'Description' field can't be an empty value. Item not created.</div>";
            }

        } catch(PDOException $error) {
            echo "<div class='alert alert-danger'>Unable to create item. <br>" . $error->getMessage() . "</div>";
        }
    }

    $page_title = "Create shop item";
    $submit_type = "create";

    include_once "../../templates/header.php";
    include_once "edit.php";
    include_once "../../templates/footer.php";
?>