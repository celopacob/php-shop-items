<?php
    include_once APP_ROOT . "/config/core.php";
    include_once APP_ROOT . "/src/models/ShopItemModel.php";


    class ShopItemController {

        private $model;


        public function __construct($db) {
            $this->model = new ShopItemModel($db);
        }

        public function handleRequest() {

            $action = isset($_GET["action"]) ? $_GET["action"] : "";

            switch ($action) {
                case "create":
                    $this->create();
                    break;

                case "edit":

                case "update":
                    $this->update();
                    break;

                case "delete":
                    $this->delete();
                    break;

                default:
                    $this->list();
            }
        }

        private function list() {

            $page_title = "Shop Items";
            $result = $this->model->getAll();
            include APP_ROOT . "/src/views/ShopItem/list.php";
        }

        private function create() {

            if($_POST) {
                $shop_item = $this->model;

                try {
                    $shop_item->description = isset($_POST['description']) && $_POST['description']!= ''? $_POST['description']:null;
                    $shop_item->checked = isset($_POST['checked'])? $_POST['checked'] : 0;

                    if($shop_item->description != null) {
                        $shop_item->create();
                        echo "<h4>Item created.</h4>";
                    } else {
                        echo "<h4>'Description' field can't be an empty value. Item not created.</h4>";
                    }

                } catch(PDOException $error) {
                    echo "<h4>Unable to create item. <br>" . $error->getMessage() . "</h4>";
                }
            } else {
                include APP_ROOT . "/src/views/ShopItem/create.php";
            }
        }

        private function update() {
            $shop_item = $this->model;

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
                            echo "<h4>Item updated.</h4>";
                        } else {
                            echo "<h4>'Description' field can't be an empty value. Item not updated.</h4>";
                        }
                    }
                } catch(PDOException $error) {
                    echo "<div class='alert alert-danger'>Unable to update item. <br>" . $error->getMessage() . "</div>";
                }
            } else {
                $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
                $shop_item->id = $id;
                $shop_item->getOne();

                include APP_ROOT . "/src/views/ShopItem/update.php";
            }
        }

        private function delete() {
            $shop_item = $this->model;
            $shop_item->id = $_POST['object_id'];

            if($shop_item->delete()) {
                echo "<h4>Object was deleted.</h4>";
            } else {
                echo "<h4>Unable to delete object.</h4>";
            }
        }
    }
?>