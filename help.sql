-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 26 2016 г., 16:54
-- Версия сервера: 5.5.48
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `help`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `sectionid` int(10) unsigned NOT NULL,
  `parent` int(10) unsigned DEFAULT NULL,
  `name` char(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`sectionid`, `parent`, `name`) VALUES
(12, NULL, 'Администрирование  MySQL'),
(100, NULL, 'JavaScript'),
(101, 100, 'Введение'),
(102, 100, 'Лексическая структура'),
(103, 100, 'Типы, значения и переменные'),
(104, 100, 'Выражения и операторы'),
(105, 100, 'Инструкции'),
(106, 100, 'Объекты'),
(107, 100, 'Массивы'),
(108, 100, 'Функции'),
(109, 100, 'Классы и модули'),
(110, 100, 'Шаблоны и регулярные выражения'),
(111, 100, 'Подмножества и расширения JavaScript'),
(112, 100, 'Серверный JavaScript'),
(113, 100, 'JavaScript в браузерах'),
(114, 100, 'Объект Window'),
(115, 100, 'Работа с документами'),
(116, 100, 'CSS'),
(117, 100, 'События'),
(118, 100, 'Работа с HTTP'),
(119, 100, 'jQuery'),
(120, 100, 'Сохранение данных на стороне клиента'),
(121, 100, 'Графика и медиа на стороне клиента'),
(122, 100, 'Прикладные интерфейсы HTML5');

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topicid` int(10) unsigned NOT NULL,
  `sectionid` int(10) unsigned NOT NULL,
  `name` char(50) NOT NULL,
  `content` text
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`topicid`, `sectionid`, `name`, `content`) VALUES
(1, 12, 'Полномочия', '<p>Команда GRANT</p>'),
(2, 12, 'Безопасность', '<p>Опасно запускать MySQL от имени суперпользователя. Надо создать пользователя MySQL специально для запуска MySQL.</p>'),
(101, 101, 'Базовый JS', '<p><strong>Лексическая структура</strong> - основные лексические конструкции (комментарии, точки с запятой, символы Юникода).</p>\r\n\r\n<p><strong>Типы данных, значения и переменные</strong></p>\r\n\r\n<p><span style="color:#006400">// Все, что следует за двумя символами слэша, является комментарием.<br />\r\n// Внимательно читайте комментарии: они описывают программный код JavaScript.<br />\r\n// Переменная - это символическое имя некоторого значения.<br />\r\n// Переменные объявляются с помощью ключевого слова var:</span><br />\r\nvar x; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color:#006400">// Объявление переменной с именем х.</span><br />\r\n<span style="color:#006400">// Присваивать значения переменным можно с помощью знака =</span><br />\r\nх = 0;<span style="color:#006400"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; // Теперь переменная х имеет значение 0</span><br />\r\nх&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// =&gt; 0: В выражениях имя переменной замещается ее значением.<br />\r\n<strong>// JavaScript поддерживает значения различных типов :</strong></span><br />\r\nх = 1;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// Числа</span>.<br />\r\nх = 0.01;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// Целые и вещественные числа представлены одним типом.</span><br />\r\nх = &quot;hello world&quot;; <span style="color:#006400">// Строки текста в кавычках.</span><br />\r\nх = &#39;JavaScript&#39;; &nbsp; <span style="color:#006400">// Строки можно также заключать в апострофы</span>.<br />\r\nх = true;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// Логические значения.</span><br />\r\nх = false;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// Другое логическое значение.</span><br />\r\nх = null;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// null - особое значение, обозначающее &quot;нет значения&quot;.</span><br />\r\nх = undefined; <span style="color:#006400">// Значение undefined подобно значению null</span></p>\r\n\r\n<p><strong>Объекты и массивы </strong></p>\r\n\r\n<p><span style="color:#006400">// Наиболее важным типом данных в JavaScript являются объекты.<br />\r\n// Объект - это коллекция пар имя/значение или отображение строки в значение.</span><br />\r\nvar book = {&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// Объекты заключаются в фигурные скобки.</span><br />\r\n&nbsp;&nbsp;&nbsp; topic: &quot;JavaScript&quot;&quot;,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// Свойство &quot;topic&quot; имеет значение &quot;JavaScript&quot;.</span><br />\r\n&nbsp;&nbsp;&nbsp; fat: true &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color:#006400">// Свойство &quot;fat&quot; имеет значение true.</span><br />\r\n};<span style="color:#006400">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; // Фигурная скобка отмечает конец объекта.</span><br />\r\n<span style="color:#006400">// Доступ к свойствам объектов выполняется с помощью . или []:</span><br />\r\nbook.topic&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// =&gt; &quot;JavaScript&quot;</span><br />\r\nbook[&quot;fat&quot;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// =&gt; true: другой способ получить значение свойства.</span><br />\r\nbook.author = &quot;Flanagan&quot;;<span style="color:#006400"> // Создать новое свойство присваиванием.</span><br />\r\nbook.contents = {};&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// {} - пустой объект без свойств.</span><br />\r\n<span style="color:#006400">// JavaScript поддерживает массивы (списки с числовыми индексами) значений:</span><br />\r\nvar primes = [2, 3, 5, 7]; <span style="color:#006400">// Массив из 4 значений, ограничивается [ и ].</span><br />\r\nprimes[0]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// =&gt; 2: первый элемент (с индексом 0) массива,</span><br />\r\nprimes.length&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// =&gt; 4: количество элементов в массиве.</span><br />\r\nprimes[primes.length-1] <span style="color:#006400">// =&gt; 7: последний элемент массива.</span><br />\r\nprimes[4] = 9;<span style="color:#006400"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; // Добавить новый элемент присваиванием.</span><br />\r\nprimes[4] = 11;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#006400"> // Или изменить значение имеющегося элемента.</span><br />\r\nvar empty = [];&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#006400"> // [] - пустой массив без элементов.</span><br />\r\nempty.length&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// =&gt; 0</span><br />\r\n<span style="color:#006400">// Массивы и объекты могут хранить другие массивы и объекты:</span><br />\r\nvar points := [&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#006400"> // Массив с 2 элементами.</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; {x:0, у:0}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#006400">// Каждый элемент - это объект.</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; {x:1, у:1}<br />\r\n];<br />\r\nvar data = {&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#006400"> // Объект с 2 свойствами</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; trial1: [[1.2], [3.4]]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#006400"> // Значение каждого свойства - это массив.</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; trial2: [[2,3], [4,5]]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#006400">&nbsp; // Элементами массива являются массивы.</span><br />\r\n};</p>'),
(102, 101, 'Клиентский JS', '222222222222222');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`sectionid`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topicid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `sectionid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `topicid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
