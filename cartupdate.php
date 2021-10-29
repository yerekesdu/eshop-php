<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $goodId = $_POST['goodId'];
        $goodNum = $_POST['goodNum'];
        session_start();

        foreach($_SESSION['cart'] as $subkey => $good){
            if($good['gid'] == $goodId){
                $_SESSION['cart'][$subkey]['gnum']=$goodNum;
                break;
            }
        }
        echo "updated";
    }

?>