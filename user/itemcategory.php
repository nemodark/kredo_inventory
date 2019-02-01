<?php 
include 'header.php';
include_once '../classes/Item.php'
?>

<div class="container">

    <div class="row">
        <?php
                        $item = new Item;
                        $category_id = $_GET['category_id'];
                        $result = $item->get_items_by_category($category_id);
                        if($result){
                        foreach($result as $row){
                            extract($row);
                                echo "<div class='col-4 mt-5'>";
                                echo "<div class='card'>";
                                echo "<div class='card-body'>";
                                echo "<h5 class='card-title'>".$item_name."</h5>";
                                echo "<p class='card-text'>Price: $".$item_price."</p>";
                                
                                if($item_status == 'available'){
                                    echo "<form method='post'>";
                                    echo "<div class='form-group'>";
                                    echo "<input type='number' class='form-control w-25' name='quantity' max='$item_quantity' min='1'>";
                                    echo "</div>";
                                    echo "<button type='submit' name='buy' class='btn btn-primary text-white btn-block w-50'>Buy</a>";
                                    echo "</form>";
                                }
                                else{
                                    echo "<div class='form-group'>";
                                    echo "<input type='number' class='form-control w-25 readonly' max='$item_quantity' min='1' readonly>";
                                    echo "</div>";
                                    echo "<a class='btn btn-primary disabled text-white btn-block w-50'>Sold Out</a>";
                                }
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                        }
                        }
                        else{
                            echo "<div class='mt-5 text-center'>No items</div>";
                        }
                    ?>
    </div>
</div>


<?php
include 'footer.php';
?>