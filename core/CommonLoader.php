<?php




/**
* Loads the main config.php file
*
* This function lets us grab the config file even if the Config class
* hasn't been instantiated yet
*
* @access	private
* @return	array
*/



if (! function_exists('get_config')) {
    function &get_config($replace = array())
    {
        static $_config;

        if (isset($_config)) {
            return $_config[0];
        }

        // Is the config file in the environment folder?
        if (! defined('ENVIRONMENT') or ! file_exists($file_path = APPPATH.'config/'.ENVIRONMENT.'/config.php')) {
            $file_path = APPPATH.'config/config.php';
        }

        // Fetch the config file
        if (! file_exists($file_path)) {
            exit('The configuration file does not exist.');
        }

        require($file_path);

        // Does the $config array exist in the file?
        if (! isset($config) or ! is_array($config)) {
            exit('Your config file does not appear to be formatted correctly.');
        }

        // Are any values being dynamically replaced?
        if (count($replace) > 0) {
            foreach ($replace as $key => $val) {
                if (isset($config[$key])) {
                    $config[$key] = $val;
                }
            }
        }

        return $_config[0] =& $config;
    }
}




/**
* Class registry
*
* This function acts as a singleton.  If the requested class does not
* exist it is instantiated and set to a static variable.  If it has
* previously been instantiated the variable is returned.
*
* @access	public
* @param	string	the class name being requested
* @param	string	the directory where the class should be found
* @param	string	the class name prefix
* @return	object
*/
if (! function_exists('load_class')) {
    function &load_class($class, $directory = 'libraries')
    {
        static $_classes = array();

        // Does the class exist?  If so, we're done...
        if (isset($_classes[$class])) {
            return $_classes[$class];
        }

        $name = false;

        // Look for the class first in the native system/libraries folder
        // thenin the local application/libraries folder
        foreach (array(BASEPATH, APPPATH) as $path) {
            if (file_exists($path.$directory.'/'.$class.'.php')) {
                $name = $class;

                if (class_exists($name) === false) {
                    require($path.$directory.'/'.$class.'.php');
                }

                break;
            }
        }

        // Is the request a class extension?  If so we load it too
        if (file_exists(BASEPATH.'/'.$directory.'/'.$class.'.php')) {
            $name = $class;

            if (class_exists($name) === false) {
                require(BASEPATH.'/'.$directory.'/'.$class.'.php');
            }
        }

        // Did we find the class?
        if ($name === false) {
            // Note: We use exit() rather then show_error() in order to avoid a
            // self-referencing loop with the Excptions class
            exit('Unable to locate the specified class: '.$class.'.php');
        }

        // Keep track of what we just loaded
        is_loaded($class);

        $_classes[$class] = new $name();
        return $_classes[$class];
    }
}


/**
* Keeps track of which libraries have been loaded.  This function is
* called by the load_class() function above
*
* @access	public
* @return	array
*/
if (! function_exists('is_loaded')) {
    function is_loaded($class = '')
    {
        static $_is_loaded = array();

        if ($class != '') {
            $_is_loaded[strtolower($class)] = $class;
        }

        return $_is_loaded;
    }
}

/**
* Error Handler
*
* This function lets us invoke the exception class and
* display errors using the standard error template located
* in application/errors/errors.php
* This function will send the error page directly to the
* browser and exit.
*
* @access	public
* @return	void
*/
if (! function_exists('show_error')) {
    function show_error($message, $status_code = 500, $heading = 'An Error Was Encountered')
    {
        //$_error =& load_class('Exceptions', 'core');
        //	echo $_error->show_error($heading, $message, 'error_general', $status_code);
    
        print '<style type="text/css">';
        print '.error_404_info {';
        print '	text-align: center;';
        print '	background-color: #AEAE34;';
        print '}';
        print '.error_404 {';
        print '	text-align: center;';
        print '	background-color: #F89292;';
        print '}';
        print '</style>';
    
        echo '<p class="error_404">'.$message.'</p>';
        echo '<p class="error_404_info">for support and help you can visit <a href="http://anemone.ps">';
        echo 'anemone.ps</a></p>';

    
        exit;
    }
}


/**
* 404 Page Handler
*
* This function is similar to the show_error() function above
* However, instead of the standard error template it displays
* 404 errors.
*
* @access	public
* @return	void
*/
if (! function_exists('show_404')) {
    function show_404($page = '', $log_error = true)
    {
        //	$_error =& load_class('Exceptions', 'core');
        //	$_error->show_404($page, $log_error);
        echo $page. " not found ";
        exit;
    }
}



/*function __autoload($class_name)
{
    $dir = array('', 'application/controllers/', 'core/', 'core/libraries/');
    foreach ($dir as $directory) {

        if (file_exists($directory . $class_name . '.php')) {

            require_once ($directory . $class_name . '.php');

            return;
        }else {
            print $directory.$class_name.".php";
        }
    }
}*/
