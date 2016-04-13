<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/functions.php');
    $content = array(); 
    addContent($content, 'Инициализация', 'init');
    addContent($content, 'Доступ к элементам', 'accsess');
    addContent($content, 'Другие индексы', 'other_indexes');
    addContent($content, 'Операции с массивами', 'op_arr');
    addContent($content, 'Многомерные массивы', 'multi_dimension');
    addContent($content, 'Сортировка', 'sort');
    addContent($content, 'Применение функции к массиву', 'array_walk');
    html('Массивы', $content);
?>