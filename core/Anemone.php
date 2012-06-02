<?php


/***

Load the configurations 
***/

require (BASEPATH . '/CommonLoader.php');
require (BASEPATH . '/libraries/Loader.php');
require (BASEPATH . '/configs/configs.php');
$URI = &load_class("Resolver");

$session = &load_class("Session", "libraries");
//TODO:Need more work on the Router
include (BASEPATH . '/Router.php');
if ($URI->action == '') {
    $view = $config['default_action'];
} else {
    $view = $URI->action;
}

// Set the time limit of the exution
if (function_exists("set_time_limit") == true and @ini_get("safe_mode") == 0) {
    @set_time_limit(300);
}


$output = &load_class("Smarty", "libraries/smarty");


//$loader = & load_class('Loader');
$loader = new Loader($config); // $config from configs/configs.php


// Load the base controller class
require 'core/Controller.php';
//new Controller($output);
if ($URI->controller != "") {


    if (!file_exists(APPPATH . 'controllers/' . $URI->controller . ".php")) {
        show_error('Unable to load your default controller. Please make sure the controller specified in your Routes.php file is valid.');
    }

    include (APPPATH . 'controllers/' . $URI->controller . '.php');
} else {

    if (!file_exists(APPPATH . 'controllers/' . $config['default_controller'] .
        ".php")) {
        show_error('Unable to load your default controller. Please make sure the controller specified in your Routes.php file is valid.');
    }

    include (APPPATH . 'controllers/' . $config['default_controller'] . '.php');

}
if ($URI->controller == "") {
    $class = $config['default_controller'];
    $method = $config['default_action'];
} else {
    $class = $URI->controller;
    $method = $URI->action;
}


if (!class_exists($class)) {


    show_404($class . '/' . $method);
}

$loader = new Loader($config);

if ($session->is_logged_in()) {
    $output->assign('user_id', $session->user_id);
}
if (is_file(APPPATH . "models/" . $class . "Model.php")) {
    require 'core/Model.php';
    require (APPPATH . "models/" . $class . "Model.php");
    $model_class = $class . "Model";
    $model = new $model_class($output, $loader, $URI, $session, $model);
    $ZA = new $class($output, $loader, $URI, $session, $model);
} else {
    $ZA = new $class($output, $loader, $URI, $session);
}


// Call the requested method.
// Any URI segments present (besides the class/function) will be passed to the method for convenience
if ($URI->action == '') {
    call_user_func_array(array(&$ZA, 'index'), $URI->segments);
} else {
    if (!in_array(strtolower($method), array_map('strtolower', get_class_methods($ZA)))) {


        show_404("{$class}/{$method}");

    }
    call_user_func_array(array(&$ZA, $method), $URI->segments);
}

$output->assign('BASE_URL', $URI->base_url);


/*

plug the variables into smarty template engine

*/

//print_r(get_object_vars($ZA));

//print_r(get_class_vars(get_class($ZA)));

if ($URI->controller == "") {
    $output->assign("controller", $config['default_controller']);
    if (is_file(APPPATH . "/views/" . $config['default_controller'] . "/" . $view .
        '.tpl')) {
        if ($URI->controller != "admincp") {

           
                $output->assign('content', $output->fetch(APPPATH . "/views/" . $config['default_controller'] .
                    "/" . $view . '.tpl'));
           
        } else {
            $output->assign('content', $output->fetch(APPPATH . "/views/" . $config['default_controller'] .
                "/" . $view . '.tpl'));
        }

    } else {
        show_error("We can't find your default view at '" . APPPATH . "views/" . $config['default_controller'] .
            "/" . $view . ".tpl' ");
    }

} else {

    if ($URI->action[0] == "_") { //if function start with "_" so it's an ajax function with no view
        exit;
    }
    $output->assign("controller", $URI->controller);
    $output->assign('action', $URI->action);
    if (is_file(APPPATH . "/views/" . $URI->controller . "/" . $view . '.tpl')) {

        if ($URI->controller != "admincp") {

            $output->assign('content', $output->fetch(APPPATH . "/views/" . $URI->
                controller . "/" . $view . '.tpl'));

        } else {
            $output->assign('content', $output->fetch(APPPATH . "/views/" . $URI->
                controller . "/" . $view . '.tpl'));
        }

    } else {
        show_error("Anemone can't find the view at " . APPPATH . "/views/" . $URI->
            controller . "/" . $view . '.tpl');
    }

}

ob_clean();
$output->assign('action', $URI->action);
if (is_file(APPPATH . "/views/layout/main.tpl")) {

    if ($URI->controller != "admincp") {


        $output->display(APPPATH . "/views/layout/main.tpl");

    } else {
        $output->display(APPPATH . "/views/layout/main.tpl");
    }


}

///
// here close the DB connection
//ORM::close();



?>