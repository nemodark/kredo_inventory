<?php 
include 'header.php';
include_once '../classes/Item.php';
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h3>Items</h3>
        </div>
        <div class="card-body">
            <table class='table'>
                <thead>
                    <th>Item ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                        $item = new Item;
                        $category_id = $_GET['category_id'];
                        $result = $item->get_items_by_category($category_id);

                        foreach($result as $row){
                            extract($row);
                            echo "<tr>";
                            echo "<td>".$item_id."</td>";
                            echo "<td>".$item_name."</td>";
                            echo "<td>".$item_quantity."</td>";
                            echo "<td>$".$item_price."</td>";
                            echo "<td>";
                                if($item_status == 'available'){
                                    echo "<span class='badge badge-success'>available</span>";
                                }
                                else{
                                    echo "<span class='badge badge-danger'>soldout</span>";
                                }
                            echo "</td>";
                            echo "<td><a href='edititem.php?id=$item_id' class='btn btn-sm btn-info'>Edit</a> <a href='deleteitem.php?id=$item_id' class='btn btn-sm btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>


<?php
include 'footer.php';
?>