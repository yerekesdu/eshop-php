<?php
    require_once 'db.php';

    $db = new Database();

    $items = $db->selectAll("goods");

    $oneitem = $db->selectOne("goods", 8);

    print_r($oneitem);
?>