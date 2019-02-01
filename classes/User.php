<?php

require_once 'Database.php';

class User extends Database{

    public function get_users(){
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        else{
            return "No data";
        }
    }
    public function get_user($user_id){
        $sql = "SELECT * FROM users WHERE user_id=$user_id";
        $result = $this->conn->query($sql);

        $row=$result->fetch_assoc();
            return $row;
    }

    public function create_user($username, $password, $firstname, $lastname, $email, $status){
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            echo "Username already exist.";
        }
        else{
            $sql = "INSERT INTO users(username, email, firstname, lastname, password, status) VALUES('$username', '$email', '$firstname', '$lastname', '$password', '$status')";
            $result = $this->conn->query($sql);

            if($result){
                $this->redirect("index.php");
            }
            else{
                echo $this->conn->error;
            }
        }
    }

    //all pages except login.php
    public function login_required(){
        session_start();

        if($_SESSION['user_id'] == FALSE){
            $this->redirect('login.php');
        }
    }

    //login.php
    public function logged_in(){
        session_start();
        if(isset($_SESSION['user_id'])){
        //$_SERVER['HTTP_REFERER'] - previous page
        $this->redirect('javascript://history.go(-1)');
        exit;
        }
    }
    // header('Location: javascript://history.go(-1)');

    public function login($username, $password){
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            if($row['status'] == 'admin'){
                $this->redirect("admin/index.php");
            }
            elseif($row['status'] == 'user'){
                $this->redirect('user/index.php');
            }
        }
        else{
            echo "Invalid Username or Password";
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        $this->redirect("login.php");
    }
}