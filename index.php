<?php

# Connect Class Email Search
require_once ('EmailSearch.inc.php');

# The existence check POST array
if($_POST['adress'] !== null)
	{		
# Create an instance of a class library
$EmailSearch = new EmailSearch();

# Check URL
$adress =  $EmailSearch->parse_urls($_POST['adress']);
	if(empty($adress))
		{
			# throwing error if the URL is not correct
			$err = 'Ошибка, URL не валиден!';
		}else{
			# Else pass a page on the analysis function
$result = $EmailSearch->Search($adress);

# Make a line break for each email
$email_txt = implode("\r", $result);
        # If the address is not found..
		if(empty($email_txt))
			{
 				$err = 'Адресов не обнаружено!';
			}
			# Create TXT file the export email
			$file = 'email_'.$_SERVER['REMOTE_ADDR'].'.txt';
			$current = @file_get_contents($file);
			$current .= $email_txt;
			file_put_contents($file, $current);
		} 	
	}
	# Connect tpl page
require_once ('/temp/main.tpl');