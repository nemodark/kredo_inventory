<?php
include 'header.php';
include 'classes/Category.php';
?>
<form action="" method="post">
  <div class="card container px-0 mt-5">
    <h5 class="card-header text-center bg-secondary text-white">Add Item</h5>
    <div class="card-body">
      <div class="form-group">
      <label class="card-title">Item Name</label>
      <input type="text" class="form-control" name="name">
      </div>
      <div class="form-group">
      <label class="card-title">Category</label>
      <select name="category" class="form-control">
            <option value=""></option>
            <?php
                $category = new Category;
                $result = $category->get_categories();
                foreach($result as $row){
                    $cat_id = $row['category_id'];
                    $cat_name = $row['category_name'];
                    echo "<option value='$cat_id'>$cat_name</option>";
                }
            ?>
      </select>
      </div>
    </div>

    <div class="card-footer bg-white">
      <button href="#" class="btn btn-outline-secondary form-control" type="submit" name="submit">Add Item</button>
    </div>
  </div>

  </form>
</body>

</html>
<?php
        if(isset($_POST['submit'])){
        $name = $_POST['name'];

        $category = new Category;

        $category->insert($name);

        $category->redirect('categories.php');
        }
      ?>