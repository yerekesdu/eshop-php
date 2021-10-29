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
        require_once 'sidebar-top.php'
    ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!--OUR CONTENT HERE-->

<?php
    require_once('../db.php');
    $goods = getAllGoods();
    // print_r($goods);
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($goods as $good){
      ?>
    <tr>
    
      <td><?php echo $good['id']; ?></td>
      <td><?php echo $good['name']; ?></td>
      <td><?php echo $good['description']; ?></td>
      <td><?php echo $good['price']; ?></td>
      <td><?php echo $good['qty']; ?></td>
      <td><?php echo $good['cname']; ?></td>
      <td><a class = "btn btn-primary" href="onegood.php?id=<?php echo $good['id'];?>">Details</a></td>
        
      </form>
    </tr>
<?php
       }
?>
</tbody>
</table>
                    

        </div>
    <?php
        require_once 'sidebar-bottom.php'
    ?>
</body>
</html>