<?php


require_once 'core/libraries/idiorm.php';
class Loader
{
    protected $config='';
    public static $loaded = array();
    public function __construct($config)
    {
        $this->config = $config;
        ORM::configure('mysql:host='.$this->config['db_host'].';dbname='.$this->config['db_name']);
        ORM::configure('username', $this->config['db_username']);
        ORM::configure('password', $this->config['db_password']);
    }
    
    
    public function model($model_name, $folder = 'models')
    {
        
       // if(is_file('application/'.$folder.'/'.$model_name.'.php')){
        if (in_array($model_name, $this->loaded)) {
            //print_r($this::$loaded);
            $model = ORM::for_table($model_name);
            return $model;
        } else {
             
            
          // ORM::clear_cache();
            array_push($this->loaded, $model_name);
            // require 'application/'.$folder.'/'.$model_name.'.php';
            $model = ORM::for_table($model_name);
            return $model;
        }
             
                       
            
           
        //  }else {
      //      print 'break';
      //  }
    }
    
    public function helper($helper_name)
    {
        if (is_file('core/helpers/'.$helper_name.'_helper.php')) {
            require 'core/helpers/'.$helper_name.'_helper.php';
        }
    }
    
    public function library($library_name)
    {
        if (is_file('core/libraries/'.$library_name.'.php')) {
            
            //require 'core/libraries/'.$library_name.'.php';
            $o =  &load_class($library_name, "libraries");
            return  $o;
        }
    }
    
    
    public function controller($controller_name)
    {
        if (is_file('application/controllers/'.$controller_name.'.php')) {
            require_once 'application/controllers/'.$controller_name.'.php';
        }
    }
    
    public function vendor($vendor)
    {
        if (is_file('application/vendors/'.$vendor_name.'.php')) {
            require_once 'application/vendors/'.$vendor_name.'.php';
        }
    }
}
