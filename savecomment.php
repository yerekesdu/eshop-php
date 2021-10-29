<?php

    if($_SERVER['REQUEST_METHOD']=="POST"){
        
        require_once 'db.php';

        $uid = $_POST['uid'];
        $gid = $_POST['gid'];
        $comment = $_POST['comment'];
        
        // commentGood(2,2,'asdasd');

        commentGood($uid, $gid, $comment);
        echo "success";
    }

?>