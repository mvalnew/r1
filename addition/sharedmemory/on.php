<?php
    $left = $_GET['left'];
    $top = $_GET['top'];
    
    $systemid = 756;
    $mode = 'c';
    $permission = 0755;
    $size = 10;
    $shmid = shmop_open($systemid, $mode, $permission, $size);
    shmod_write($shmid, $left, 0);
?>