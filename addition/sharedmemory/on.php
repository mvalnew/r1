<?php
    $left = $_GET['left'];
    $top = $_GET['top'];
    
    $systemid = 0xff3;
    $mode = 'c';
    $permission = 0777;
    $size = 100;
    $shmid = shmop_open($systemid, $mode, $permission, $size);
    
    shmop_write($shmid, $left, 0);
    shmop_write($shmid, $top, 10);
 ?>