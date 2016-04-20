<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/functions.php');
    $content = array(); 
    addContent($content, 'Выборка данных', 'search');
    addContent($content, 'Внесение новой информации', 'insert');
    addContent($content, 'Подготовленные операторы', 'prepared_operators');
    html('Доступ к MySQL из PHP', $content);
?>