<!DOCTYPE HTML>
<html>
<head>
    <title>Результат ввода ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<h3>Результат ввода</h3>
<?php
	// создание коротких имен
	$isbn = trim($_POST['isbn']);
	$author = trim($_POST['author']);
	$title = trim($_POST['title']);
	$price = trim($_POST['price']);
	if (!$isbn || !$author || !$title || !$price) {
		echo 'Вы не ввели необходимые сведения.<br>'.
		 ' Вернитесь на предыдущую страницу и повторите ввод.';
		exit;
	}
	if (!get_magic_quotes_gpc()) {
		$isbn = addslashes($isbn);
		$author = addslashes($author);
		$title = addslashes($title);
		$price = addslashes($price);
	}
	@ $db = new mysqli('localhost', 'mysql','mysql','books');
	if (mysqli_connect_errno()) {
		echo 'Ошибка: Не удалось установить соединение'.
		' с базой данных. Повторите попытку позже.';
		exit;
	}
	$query = "insert into books values ('".$isbn."','".$author."','".$title."','".$price."')";
	$result = $db->query($query);
	if ($result) {
		echo $db->affected_rows." книга добавлена в базу данных";
	} else {
		echo "Произошла ошибка. Книга не внесена.";
	}
	$db->close();
?>
</body>
</html>
