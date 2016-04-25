<?php
	include($_SERVER['DOCUMENT_ROOT'].'/modules/functions.php');
    $content = array(); 
    addContentOfDB($content, 12);
    html('Администрирование MySQL', $content, 'db');
?>