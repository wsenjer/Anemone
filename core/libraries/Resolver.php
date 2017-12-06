<?php
// A class to help work with Sessions
// In our case, primarily to manage logging users in and out

// Keep in mind when working with sessions that it is generally
// inadvisable to store DB-related objects in sessions

class Resolver
{
    public $controller = "";
    public $action = "";
    public $segments= array();
    public $base_url = "";
    public $admin_url = "";
    
    
    
    public function __construct()
    {
        $pattern = '//';
            
        $_url = preg_replace($pattern, '', $_SERVER['REQUEST_URI'], 1);
        $_tmp = explode('?', $_url);
        $_url = $_tmp[0];

        if ($_url = explode('/', $_url)) {
            foreach ($_url as $tag) {
                if ($tag) {
                    $_app_info['params'][] = $tag;
                }
            }
            $this->controller  = (isset($_app_info['params'][1]) ? mysql_escape_string($_app_info['params'][1]) : '');
            $this->action  = (isset($_app_info['params'][2]) ? mysql_escape_string($_app_info['params'][2]) : '');
            
               
            for ($i=3;$i<count($_app_info['params']);$i++) {
                array_push($this->segments, mysql_escape_string($_app_info['params'][$i]));
            }
            $app_main_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
                
            $this->base_url = 'http://' . $_SERVER['HTTP_HOST'] . $app_main_dir . '/';
        }
    }
    public function redirect_to($path)
    {
        header('Location: '. $this->base_url.$path, true, 302);
        exit();
    }
}
