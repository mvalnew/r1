<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/functions.php');
    $content = array(); 
    addContent($content, 'Поисковая страница', 'search');
    html('Доступ к MySQL из PHP', $content);
?>