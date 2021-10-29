<?php

    if($_SERVER['REQUEST_METHOD']=="POST"){
        session_start();
        print_r($_SESSION['cart']);
        if(!isset($_SESSION['user'])){
            header("location:loginform.php");
        } 

        require_once 'db.php';
        foreach($_SESSION['cart'] as $subkey => $good){
                buyGood($_SESSION['user']['id'], 
                $_SESSION['cart'][$subkey]['gid'], 
                $_SESSION['cart'][$subkey]['gnum'] );
        }
        unset($_SESSION['cart']);
    }

?>