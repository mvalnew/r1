<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/functions.php');
    $content = array(); 
    addContent($content, 'Монитор MySQL', 'monitor');
    addContent($content, 'Создание пользователей', 'users');
    addContent($content, 'Создание таблиц', 'tables');
    html('Создание БД', $content);
?>