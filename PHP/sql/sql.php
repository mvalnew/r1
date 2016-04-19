<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/functions.php');
    $content = array(); 
    addContent($content, 'Вставка', 'insert');
    addContent($content, 'Выборка', 'select');
    addContent($content, 'Выборка из нескольких таблиц', 'multitabs');
    addContent($content, 'Упорядочивание и группировка', 'order');
    addContent($content, 'Подзапросы', 'subrequest');
    addContent($content, 'Обновление записей', 'update');
    addContent($content, 'Изменение структуры таблицы', 'reorg');
    addContent($content, 'Удаление записей, таблиц, БД', 'delete');
    html('SQL. Работа с БД.', $content);
?>