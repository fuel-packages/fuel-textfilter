<?php

/**
 * @package BBCode - Easy BBCode
 * @author Robik
 * @version 0.3
 * @license http://opensource.org/licenses/gpl-3.0.html
 */

class BBCode{
	
	private $tags = array(
		'b','i','u','url','small','big','p','center','color','size','img');
	
	
	/**
	 * Replaces all the BBCodes to HTML Codes
	 * @param string $text: the text with BBCodes
	 * @param array [$usertags] array of tags to replace
	 */
	function replace($text, $usertags = "") {
		
		// If user doesn't specify tags, we'll replace all
		if($usertags == "") {
			$usertags = $this->tags;
		}
		
		// Checking that user tags contains unknown for us BBCode 
		$diff = array_diff($usertags,$this->tags);
		
		// If yes
		if(count($diff))
			throw new Exception("Unknown tag:".join(' ',$diff));
		
		// Deleting spaces from begging and end of string
		$done = trim($text);
		
		// Deleting all html code
		$done = htmlspecialchars($done);
		
		if(in_array("url",$usertags)) {
			$done = preg_replace("#\[url\](.*?)?(.*?)\[/url\]#si", "<A HREF=\"\\1\\2\" TARGET=\"_blank\">\\1\\2</A>", $done);
			$done = preg_replace("#\[url=(.*?)?(.*?)\](.*?)\[/url\]#si", "<A HREF=\"\\2\" TARGET=\"_blank\">\\3</A>", $done);
		}
		
		if(in_array("b",$usertags))
			$done = preg_replace("#\[b\](.*?)\[/b\]#si", "<b>\\1</b>", $done);
		
		if(in_array("i",$usertags))
	        $done = preg_replace("#\[i\](.*?)\[/i\]#si", "<i>\\1</i>", $done);
        
	    if(in_array("u",$usertags))
        	$done = preg_replace("#\[u\](.*?)\[/u\]#si", "<u>\\1</u>", $done);
        
        if(in_array("small",$usertags))	
        	$done = preg_replace("#\[small\](.*?)\[/small\]#si", "<small>\\1</small>", $done);
        
        if(in_array("big",$usertags))
        	$done = preg_replace("#\[big\](.*?)\[/big\]#si", "<big>\\1</big>", $done);
        
        if(in_array("p",$usertags))
        	$done = preg_replace("#\[p\](.*?)\[\/p\]#si", "<p>\\1</p>", $done);
        
        if(in_array("center",$usertags))
        	$done = preg_replace("#\[center\](.*?)\[\/center\]#si", "<p align=\"center\">\\1</p>", $done);
        
        if(in_array("color",$usertags))
        	$done = preg_replace("#\[color=(http://)?(.*?)\](.*?)\[/color\]#si", "<span style=\"color:\\2\">\\3</span>", $done);
        
        if(in_array("size",$usertags))
        	$done = preg_replace("#\[size=(http://)?([0-9]{0,2})\](.*?)\[/size\]#si", "<span style=\"font-size:\\2px\">\\3</span>", $done);
        
        if(in_array("img",$usertags))	
        	$done = preg_replace("#\[img\](.*?)\[/img\]#si", "<img src=\"\\1\" border=\"0\" alt=\"Image\" />", $done);
                
        // Changing [enter] to <br />
        $done = nl2br($done);
        
        return $done;
	}
	
}
