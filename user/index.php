<?php 
include 'header.php';
include_once '../classes/Item.php';
include_once '../classes/Purchase.php';
?>

<div class="container">
    <h1 class='mt-3'>All Items</h1>
    <div class="row">
    <?php
                        $item = new Item;

                        $result = $item->get_items();

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
                                    echo "<input type='hidden' name='item_id' value='$item_id'>";
                                    echo "<input type='number' class='form-control w-25' name='quantity' max='$item_quantity' min='1'>";
                                    echo "</div>";
                                    echo "<button type='submit' name='buy' class='btn btn-primary text-white btn-block w-50'>Buy</button>";
                                    echo "</form>";
                                }
                                else{
                                    echo "<div class='form-group'>";
                                    echo "<input type='number' class='form-control w-25 readonly' readonly>";
                                    echo "</div>";
                                    echo "<a class='btn btn-primary disabled text-white btn-block w-50'>Sold Out</a>";
                                }
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                        }

                        if(isset($_POST['buy'])){
                            $item_id = $_POST['item_id'];
                            $purchase_quantity = $_POST['quantity'];
                            
                            $purchase = new Purchase;
                            $purchase->buy($item_id, $purchase_quantity, $user_id);
                        }
                    ?>
                    
    </div>
</div>


<?php
include 'footer.php';
?>