<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=1.0">
	<h1>Латыпова Эльза ПИ-323</h1>
</head>
<body>
	<?php
	//f0592623_proc admin f0592623_proc
	define ("HOST", "localhost");
	define ("USER", "f0593243_films");
	define ("PASS", "123");
	define ("DB", "f0593243_films"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	?>	<h2>Зарегистрированные Фильмы:</h2>
	<table border="1">
	 <th> id </th><th> Название </th> <th> жанр </th><th> режисёр </th><th> год выпуска </th> <th> кассовые сборы </th>
	 <th> Редактировать </th> <th> Уничтожить </th> </tr>
	<?php
	$result=$mysqli->query("SELECT id_film, name_film, genre, director, year, fees
	FROM film"); // запрос на выборку сведений о пользователях
	while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
	 echo "<tr>";
	 echo "<td >" . $row['id_film'] . "</td>";
	 echo "<td >" . $row['name_film'] . "</td>";
	 echo "<td >" . $row['genre'] . "</td>";
	 echo "<td>" . $row['director'] . "</td>";
	 echo "<td>" . $row['year'] . "</td>";
	 echo "<td>" . $row['fees'] . "</td>";
	 echo "<td><a href='editFilm.php?id_film=" . $row['id_film']
	. "' '>Редактировать</a></td>"; // запуск скрипта для редактирования
	 echo "<td><a href='deleteFilm.php?id_film=" . $row['id_film']
	. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
	 echo "</tr>";
	}
	print "</table>";
	$num_rows = mysqli_num_rows($result); // число записей в таблице БД
	print("<P>Всего фильмов: $num_rows </p>");
	?>
	<p> <a href="newFilm.php"> Добавить фильм </a>
		<br>
	<h2>Кинозалы</h2>
	<table border="1">
	<tr> 
	 <th> id </th> <th> Название зала </th> <th> Категория </th> <th> Редактировать </th> <th> Уничтожить </th> </tr>
	<?php
	$result=$mysqli->query("SELECT id_hall, name_hall, category
	FROM halls"); // запрос на выборку сведений о пользователях
	while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
	 echo "<tr>";
	 echo "<td >" . $row['id_hall'] . "</td>";
	 echo "<td >" . $row['name_hall'] . "</td>";
	 echo "<td >" . $row['category'] . "</td>";
	 echo "<td><a href='editHall.php?id_hall=" . $row['id_hall']
	. "' '>Редактировать</a></td>"; // запуск скрипта для редактирования
	 echo "<td><a href='deleteHall.php?id_hall=" . $row['id_hall']
	. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
	 echo "</tr>";
	}
	print "</table>";
	$num_rows = mysqli_num_rows($result); // число записей в таблице БД
	print("<P>Всего залов: $num_rows </p>");
	?>
	<p> <a href="newHall.php"> Добавить зал </a>
		<br>
	<h2>Киносеанс</h2>

	<table border="1">
	<tr> 
	 <th> id </th><th> Дата и время сеанса </th> <th> id фильма </th> <th> ID зала </th> <th> свободные места </th><th> занятые места </th> <th> Редактировать </th> <th> Уничтожить </th> </tr>
	<?php
	$result=$mysqli->query("SELECT id_session, begin_date_time, id_film, id_hall, count_free_places, count_busy_places
	FROM sessions"); // запрос на выборку сведений о пользователях
	while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
	 echo "<tr>";
	 echo "<td >" . $row['id_session'] . "</td>";
	 echo "<td >" . $row['begin_date_time'] . "</td>";
	 echo "<td >" . $row['id_film'] . "</td>";
	 echo "<td >" . $row['id_hall'] . "</td>";
	 echo "<td >" . $row['count_free_places'] . "</td>";
	 echo "<td >" . $row['count_busy_places'] . "</td>";
	 echo "<td><a href='editSession.php?id_session=" . $row['id_session']
	. "' '>Редактировать</a></td>"; // запуск скрипта для редактирования
	 echo "<td><a href='deleteSession.php?id_session=" . $row['id_session']
	. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
	 echo "</tr>";
	}
	print "</table>";
	$num_rows = mysqli_num_rows($result); // число записей в таблице БД
	print("<P>Всего Киносеансов: $num_rows </p>");
	?>
	<p> <a href="newSession.php"> Добавить киносенас </a>
		<br>
		<a href="gen_pdf.php"> генерация пдф </a>
		<br>
		<a href="gen_xls.php"> генерация xls </a>
</body>
</html>