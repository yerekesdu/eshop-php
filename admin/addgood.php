<?php 
 
 if($_SERVER['REQUEST_METHOD'] == "POST"){

    if($_FILES['gpic']['type']='image/jpeg' ||$_FILES['gpic']['type']='image/png')
        if($_FILES['gpic']['size'] <= 1024*2014*8){
            $filename = 'somepic.jpg';

            move_uploaded_file($_FILES['gpic']['tmp_name'], "../image/".$_FILES['gpic']['name']);
        }

    $getname = $_POST['name'];
    $getdescription = $_POST['description'];
    $getprice = $_POST['price'];
    $getqty = $_POST['qty'];
    $getcatid = $_POST['catid'];
        
    echo $getname;
    echo "<br>";
    echo $getdescription;
    echo "<br>";
    echo $getprice;
    echo "<br>";
    echo $getqty;
    echo "<br>";
    echo $getcatid;
    echo "<br>";

     if($getname && $getdescription && $getprice && $getqty && $getcatid){
         include '../db.php';
         addGood($getname, $getdescription, $getprice, $getqty, $_FILES['gpic']['name'], $getcatid);
         header("Location:goods.php");
     }
}
    // header("location:goods.php");
 ?>
