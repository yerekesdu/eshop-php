<?php
    session_start();

    if(isset($_POST['gid'])){
        $gid = $_POST['gid'];
        
        $array = removeElementWithValue($_SESSION['cart'], "gid", $gid);
        $_SESSION['cart'] = $array;

        // print_r($array);        
    }
    
    function removeElementWithValue($array, $key, $value){
        foreach($array as $subKey => $subArray){
             if($subArray[$key] == $value){
                  unset($array[$subKey]);
             }
        }
        return $array;
    }

    header("location:basket.php");
?>