<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/functions.php');
    $content = array(); 
    addContent($content, 'Операторы include() и require()', 'include');
    addContent($content, 'Функции', 'functions');
    html('Многократное использование кода', $content);
?>