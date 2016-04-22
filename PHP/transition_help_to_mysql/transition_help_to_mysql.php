<?php
	$section = trim($_POST['section']);
	$topic = trim($_POST['topic']);
	if ($section && $topic) {
		@ $db = new mysqli('localhost', 'mysql','mysql','help');
		if (!mysqli_connect_errno()) {
			$query = "select * from topics where topicid=$topic";
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			$topic_content = $row['content'];
		}
	}

	include($_SERVER['DOCUMENT_ROOT'].'/modules/functions.php');
    $content = array(); 
    addContent($content, 'Начало', 'step01');
    addContent($content, 'CKeditor', 'ckeditor');
    html('Переход help на MySQL', $content);
?>