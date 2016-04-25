<?php
	include($_SERVER['DOCUMENT_ROOT'].'/modules/functions.php');
    $content = array(); 
    addContent($content, 'Начало', 'step01');
    addContent($content, 'CKeditor', 'ckeditor');
    html('Переход help на MySQL', $content);
?>