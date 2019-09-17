<?php
    include_once './model/index.php';
    include_once './controller/index.php';
    include_once './view/index.php';

    $m = new Model();
    $c = new Controller($m);
    $v = new View($m, $c);
?>