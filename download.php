<?php

/*
* Файл отдачи экспорта email - ов после экспорта, считывается последний экспорт, привязан к IP
* author WebDevLix
* 09.10.2016
*/
$file = ('email_'.$_SERVER['REMOTE_ADDR'].'.txt');
if(file_exists($file))
	{
header ("Content-Type: application/octet-stream");
header ("Accept-Ranges: bytes");
header ("Content-Length: ".filesize($file));
header ("Content-Disposition: attachment; filename=".$file);  
readfile($file);
	}else{
		print 'Файл экспорта не найден! <a href="/">Перейти к экспорту</a>';
	}

?>