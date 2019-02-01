<?php
include 'header.php';
include 'classes/Category.php';
?>
<!doctype html>
<html lang="en">

<head>
  <title>addcategory</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
</head>

<body>
<form action="" method="post">
  <div class="card container px-0 mt-5">
    <h5 class="card-header text-center bg-secondary text-white">Add Category</h5>
    <div class="card-body">
      <label class="card-title">Category Name</label>
      <input type="text" class="form-control" name="name">
    </div>

    <div class="card-footer bg-white">
      <button href="#" class="btn btn-outline-secondary form-control" type="submit" name="submit">Add Category</button>
    </div>
  </div>


    <div class="form-group">
        <label>Category</label>
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