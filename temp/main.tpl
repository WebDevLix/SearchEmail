<!DOCTYPE html>
<html>
<head>
	<title>SearchEmail - библиотека для вебмастеров</title>
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <script src="//code.jquery.com/jquery-1.11.0.min.js" type="text/javascript"></script>  
	<script src="/js/validatr.js" type="text/javascript"></script>
</head>
<body>
    
	<form action='index.php' method='POST'>
 
	<input type="text" name="adress" id="adress" data-location="right" data-message="Поле подлежит заполнению!" required placeholder="Введите URL">

	<input type="submit" value="Получить адреса">

	</form>
    <?php print($err); ?>
    <?php print ($result != false) ? 'Ваш файл экспорта готов! Вы можете <a href="/download.php">скачать</a> его' : '';?>
