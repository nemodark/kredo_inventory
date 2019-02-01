<?php
include_once '../classes/User.php';
$user = new User;
$user->login_required();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown mr-3">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Category Select</a>
                    <div class="dropdown-menu">
                        <?php
                            include_once "../classes/Category.php";
                            $cat = new Category;
                            $result = $cat->get_categories();

                            foreach($result as $row){
                                $category_id = $row['category_id'];
                                echo "<a class='dropdown-item' href='itemcategory.php?category_id=$category_id'>".$row['category_name']."</a>";
                            }
                        ?>
                    </div>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="items.php">Item</a>
                </li>
            </ul>
            <ul class='navbar-nav mt-2 mt-lg-0'>
                <li class='nav-item'><a class='nav-link' href="logout.php">Welcome, 
                <?php 
                $user_id = $_SESSION['user_id'];
                $row = $user->get_user($user_id); 
                echo $row['username']; ?></a></li>
                <li class='nav-item'><a class='nav-link' href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    