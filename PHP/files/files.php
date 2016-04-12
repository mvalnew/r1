<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/functions.php');
    $content = array(); 
    addContent($content, 'Открытие файла', 'fopen');
    addContent($content, 'Запись в файл', 'fwrite');
    addContent($content, 'Закрытие файла', 'fclose');
    addContent($content, 'Чтение всего файла', 'file');
    html('Файлы', $content);
?>