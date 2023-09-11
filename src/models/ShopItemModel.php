<?php

    class ShopItemModel {

        private $conn;
        private $table_name = "shop_items";

        public $id;
        public $description;
        public $checked;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAll() {
            $query = "SELECT id, description, checked FROM " . $this->table_name . "";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function getOne() {
            $query = "SELECT id, description, checked FROM ". $this->table_name ."
                    WHERE
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $dataRow['id'];
            $this->description = $dataRow['description'];
            $this->checked = $dataRow['checked'];
        }

        public function create() {
            $query = "INSERT INTO
                        ". $this->table_name ."
                    SET
                        description = :description,
                        checked = :checked";

            $stmt = $this->conn->prepare($query);

            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->checked==htmlspecialchars(strip_tags($this->checked));

            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":checked", $this->checked);

            if($stmt->execute()){
               return true;
            }
            return false;
        }

        public function update() {
            $query = "UPDATE
                        ". $this->table_name ."
                    SET
                        description = :description,
                        checked = :checked
                    WHERE
                        id = :id";

            $stmt = $this->conn->prepare($query);

            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->checked=htmlspecialchars(strip_tags($this->checked));
            $this->id=htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":checked", $this->checked);
            $stmt->bindParam(":id", $this->id);

            if($stmt->execute()){
               return true;
            }
            return false;
        }

        function delete() {
            $query = " DELETE FROM " . $this->table_name . " WHERE id = ? ";
            $stmt = $this->conn->prepare($query);

            $this->id=htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(1, $this->id);

            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>