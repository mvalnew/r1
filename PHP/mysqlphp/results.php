<!DOCTYPE HTML>
<html>
<head>
    <title>Результат поиска</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<h3>Результат поиска</h3>
<?php
	// создание коротких имен
	$searchtype = trim($_POST['searchtype']);
	$searchterm = trim($_POST['searchterm']);
	if (!$searchtype || !$searchterm) {
		echo 'Вы не ввели параметры поиска. Вернитесь'.
		' на предыдущую страницу и повторите ввод.';
		exit;
	}
	if (!get_magic_quotes_gpc()) {
		$searchtype = addslashes($searchtype);
		$searchterm = addslashes($searchterm);
	}
	@ $db = new mysqli('localhost', 'mysql','mysql','books');
	if (mysqli_connect_errno()) {
		echo 'Ошибка: Не удалось установить соединение'.
		' с базой данных. Повторите попытку позже.';
		exit;
	}
	$query = "select * from books where $searchtype like '%".$searchterm."%'";
	$result = $db->query($query);
	$num_results = $result->num_rows;
	echo "<p>Найдено книг: $num_results </p>";
	for ($i=0; $i < $num_results; $i++) { 
		$row = $result->fetch_assoc();
		echo "<p><strong>".($i+1).". Название: ";
		echo htmlspecialchars(stripcslashes($row['title']));
		echo "</strong><br>Автор: ";
		echo stripcslashes($row['author']);
		echo "<br>ISBN: ";
		echo stripcslashes($row['isbn']);
		echo "<br>Цена: ";
		echo stripcslashes($row['price']);
		echo "</p>";
	}
	$result->free();
	$db->close();
?>
</body>
</html>
