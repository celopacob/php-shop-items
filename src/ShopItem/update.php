<?php
    include_once "../../config/core.php";

    if ($_POST) {
        try {
            if(isset($_POST['id'])) {
                $shop_item->id = $_POST['id'];
                $shop_item->getOne();

                $shop_item->description = isset($_POST['description']) && $_POST['description']!= ''
                    ? $_POST['description'] : $shop_item->description;
                $shop_item->checked = isset($_POST['checked'])? $_POST['checked'] : 0;

                if($shop_item->description != null && $shop_item->description != "") {
                    $shop_item->update();
                    echo "Item updated.";
                } else {
                    echo "'Description' field can't be an empty value. Item not updated.";
                }
            }

        } catch(PDOException $error) {
            echo "<div class='alert alert-danger'>Unable to update item. <br>" . $error->getMessage() . "</div>";
        }
    } else {
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
        $shop_item->id = $id;
        $shop_item->getOne();

        //Page side. TO-DO: Change all templates to a frontend app
        $page_title = "Edit shop item";
        $submit_type = "update";

        include_once "../../templates/header.php";
        include_once "edit.php";
        include_once "../../templates/footer.php";
?>
<?php
    }
?>