<?php
  require_once "Database.php";

  class Category extends Database{

    public function get_categories(){
      //query
      $sql = "SELECT * FROM categories";
      $result = $this->conn->query($sql);

      //initialize an array
      $rows = array();
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $rows[] = $row;
        }
        return $rows;
      }
      else{
        return $this->conn->error;
      }
    }


    public function insert($name){

      $sql = "INSERT INTO categories(category_name) VALUES('$name')";
      $result = $this->conn->query($sql);

      if($result){
        // header("Location: categories.php");
        echo "<script>window.location.replace('categories.php')</script>";
      }else{
        echo "Error in inserting record " .$this->conn->error;
      }
    }

    public function update($username, $password, $firstname, $lastname, $email, $id){

      $sql = "SELECT * FROM users WHERE username = '$username' AND user_id != $id";
      $result = $this->conn->query($sql);
      if($result->num_rows > 0){
        echo "Username is already taken";
      }
      else{
        $sql = "UPDATE users SET username='$username', password='$password', firstname='$firstname', lastname='$lastname', email='$email' WHERE user_id=$id";
        
        $result = $this->conn->query($sql);

        if($result){
          header("Location: userlist.php");
        }
        else{
          echo "Error: ".$this->conn->error;
        }
      }
    }

    public function delete($id){

      $sql = "DELETE FROM users WHERE user_id=$id";

      $result = $this->conn->query($sql);
      if($result){
          header("Location: userlist.php");
      }
      else{
          echo "Error: ".$this->conn->error;
      }

    }
  }
    
?>
