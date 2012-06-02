<?php
   class validator {
   	
	
		private $text;
		
		
		
	 function __construct() {
       
    }
	
	
	// validate URLs
	public function isValidURL($url)	{
		$url = trim($url);
		$url = strip_tags($url);
		return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
	}
	
	
	// Vaildate Email
	public static function isValidEmail($email){
			  $email = trim($email);
			  $email = strip_tags($email);
		      $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
		     
		      if (eregi($pattern, $email)){
		         return true;
		      }
		      else {
		         return false;
		      }   
	}
	
	
	//Validate Length
	public static function isValidLength($text,$length){
		$text = trim($text);
	    $text = strip_tags($text);
		if (mb_strlen($text,'utf-8')<$length){
			return false;
		}else{
			return true;
		}
	}
    
    
    public static function isValidDomain($url,$domain){
        if(substr($url,0,7)!="http://"){
            $url = "http://" . $url; 
        }
        $url =  str_replace("www.","",$url);
        $myParsedURL = parse_url($url);
        $myDomainName= $myParsedURL['host'];
        
        if($domain == $myDomainName)
        {
           return true;
        }
        else
        {
           return false;
        }

    }
    
    public function isEmpty($value){
        return (trim($value)=="");
    }
	
   }
?>
