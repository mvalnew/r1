<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/functions.php');
    $content = array(); 
    addContent($content, 'Пример: отправка почты', 'mail');
    addContent($content, 'Форматирование', 'format');
    addContent($content, 'Объединение и разбиение', 'join');
    addContent($content, 'Сравнение строк', 'compare');
    addContent($content, 'Поиск и замена подстрок', 'replace');
    addContent($content, 'Регулярные выражения', 'reg');
    html('Строки', $content);
?>