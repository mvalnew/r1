<?php
    $systemid = 756;
    $mode = 'a';
    $shmid = shmop_open($systemid, $mode, 0, 0);
    $size = shmop_size($shmid);
    echo shmod_read($shmid, 0, $size);
?>