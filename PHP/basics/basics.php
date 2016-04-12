<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/functions.php');
    $content = array(); 
    addContent($content, 'Пример', 'example');
    addContent($content, 'Доступ к переменным формы', 'var_form');
    addContent($content, 'Конкатенация', 'concat');
    addContent($content, 'Типы', 'type');
    addContent($content, 'Приведение типов', 'type_convert');
    addContent($content, 'Переменные переменных', 'var_var');
    addContent($content, 'Константы', 'const');
    addContent($content, 'Суперглобальные переменные', 'super_glob');
    addContent($content, 'Арифм. операции', 'arihmet');
    addContent($content, 'Строковые операции', 'string');
    addContent($content, 'Присвоение', 'assignment');
    addContent($content, 'Ссылки', 'lynk');
    addContent($content, 'Сравнения', 'equal');
    addContent($content, 'Логика', 'logic');
    addContent($content, 'Тернарная операция', 'ternar');
    addContent($content, 'Подавление ошибок', 'error_suppression');
    addContent($content, 'Операция выполнения', 'op_exec');
    addContent($content, 'Операции с массивами', 'op_arr');
    addContent($content, 'Операция определения типа', 'istanceof');
    addContent($content, 'Получение и установка типа переменной', 'get_set_type');
    addContent($content, 'Получение и установка состояния переменных', 'var_status');
    addContent($content, 'Изменение типа переменной', 'set_var_type');
    addContent($content, 'Управляющие структуры', 'direct');
    html('Основы', $content);
?>