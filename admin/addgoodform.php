<?php
    require_once '../authorized.php';
    // checkIfNotAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once 'admin-head.php';
    ?>
    <title>Document</title>
</head>
<body id="page-top">
    <?php
        require_once 'sidebar-top.php';
        require_once '../db.php';

        $cats = getAllCategories();
    ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

    <form action="addgood.php" method="POST" enctype ="multipart/form-data">
        <div class="col-4 mt-2 ml-2">
            <span>Name:</span>
        <input type="text" class="form-control col-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name">
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Description:</span>
        <input type="text" class="form-control col-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="description">
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Price:</span>
        <input type="number" class="form-control col-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="price">
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Quantity:</span>
        <input type="number" class="form-control col-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="qty">
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Category:</span>
        <select class="form-control col-sm" aria-label="Default select example" name="catid">
            <?php 
              if($cats!=null){
                foreach($cats as $cat){
            ?>
            <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
            <?php
                }
              }
            ?>
        </select>

        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="formFile" name = "gpic">

        </div>

        <div class="col-4 mt-2 ml-2">
        <button type="submit" class="btn btn-success">Add good</button>
        </div>
    </form>    

        </div>
    <?php
        require_once 'sidebar-bottom.php'
    ?>
</body>
</html>