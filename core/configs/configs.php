<?php

/*

Database Configuration

*/

$config['db_username'] = 'root';
$config['db_password'] = '';
$config['db_name'] = '';
$config['db_host'] = 'localhost';


/*
    End of Database Configuration
*/




/*



*/
$config['default_controller'] = "home";
$config['default_action'] = "index";


/**
 *
 *
 * Router
 *
 *
 * */
 
 
 /*$config['router'] = array(
                     "realestate/:real_id" => "realestate/show/:real_id"
 );*/
 
 
 /**
  *
  *
  *
  *
  * Language
  *
  *
  * **/
  
  $config['language'] = false;
  
  /**
   *
   *
   *
   *
   * */
   
   $config['auth_controllers'] = array("admincp");
