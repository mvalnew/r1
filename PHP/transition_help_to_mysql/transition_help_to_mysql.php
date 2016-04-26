<?php
	include($_SERVER['DOCUMENT_ROOT'].'/modules/functions.php');
    $content = array(); 
    addContent($content, 'CKeditor', 'ckeditor');
    addContent($content, 'Начало', 'step01');
    html('Переход help на MySQL', $content);
?>