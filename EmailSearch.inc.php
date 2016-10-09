<?php 

/*
* author WebDevLix
* date 08.10.2016
* Skype Check_Dev null
*/

class EmailSearch 
{
   public $adress;

   public function Search($adress)
   {
   	$adress = file_get_contents($adress);
  	# Regular Excession 
  	$regexp = '/([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+/i';
  	# Search with rules
    preg_match_all($regexp, $adress, $m);
    # Return with result
    return  isset($m[0]) ? $m[0] : array();
   }

   public function parse_urls($url)
		{
    
    $arUrl = parse_url($url);
    # Default setting you URL = null
    $ret = null;

    # if not http:// or https://
    if (!array_key_exists("scheme", $arUrl)
            || !in_array($arUrl["scheme"], array("http", "https")))
        # Add default url http://
        $arUrl["scheme"] = "http";

    
    if (array_key_exists("host", $arUrl) &&
            !empty($arUrl["host"]))
        
        $ret = sprintf("%s://%s%s", $arUrl["scheme"],
                        $arUrl["host"], $arUrl["path"]);

   
    else if (preg_match("/^\w+\.[\w\.]+(\/.*)?$/", $arUrl["path"]))
        # Parse URL
        $ret = sprintf("%s://%s", $arUrl["scheme"], $arUrl["path"]);

    # If URL True...
    if ($ret && empty($ret["query"]))
        $ret .= sprintf("?%s", $arUrl["query"]);

    return $ret;
	}
}
