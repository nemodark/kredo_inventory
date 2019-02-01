<?php
require_once 'Database.php';


class Item extends Database{

    public function get_items(){
        $sql = "SELECT * FROM items INNER JOIN categories ON categories.category_id=items.category_id";

        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            $rows = array();
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        else{
            echo $this->conn->error;
        }
    }

    public function get_items_by_category($category_id){
        $sql = "SELECT * FROM items WHERE category_id=$category_id";

        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            $rows = array();
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        else{
            echo $this->conn->error;
        }
    }
}