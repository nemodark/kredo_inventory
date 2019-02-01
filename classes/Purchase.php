<?php

require_once "Database.php";

class Purchase extends Database{

    public function buy($item_id, $purchase_quantity, $user_id){
        $sql = "SELECT * FROM items WHERE item_id=$item_id";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        $quantity = $row['item_quantity'];
        $price = $row['item_price'];
        $new_q = $quantity - $purchase_quantity;
        $total = $price * $purchase_quantity;
        
        if($new_q == 0){
            $sql = "UPDATE items SET item_quantity='$new_q', item_status='soldout' WHERE item_id=$item_id";
        }
        else{
            $sql = "UPDATE items SET item_quantity='$new_q' WHERE item_id=$item_id";
        }
        
        $result = $this->conn->query($sql);
        if($result){
            $sql = "INSERT INTO purchase(item_id, user_id, quantity, subtotal, purchase_status) VALUES('$item_id', '$user_id', '$purchase_quantity', '$total', 'pending')";
            $result = $this->conn->query($sql);
            if($result){
                $this->redirect("index.php");
            }
        }
    }

    public function get_purchase_history($user_id){
        $sql = "SELECT * FROM purchase INNER JOIN items ON purchase.item_id=items.item_id WHERE purchase.user_id=$user_id";
        $result = $this->conn->query($sql);

        $rows = array();

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        else{
            echo "No data";
        }
    }
}