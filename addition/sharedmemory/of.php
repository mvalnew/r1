<?php
    $systemid = 0xff3;
    $mode = 'a';
   $shmid = shmop_open($systemid, $mode, 0, 0);
   //$size = shmop_size($shmid);
    $left = shmop_read($shmid, 0, 10);
    $top = shmop_read($shmid, 10, 10);
    echo ((float)$left)."\n".((float)$top);
?>