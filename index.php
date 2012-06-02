<?php
session_start();

ob_start();
/*
@author Waseem Senjer
*/
/*
   ENVIRONMENT:  production,development
*/
define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
if (defined('ENVIRONMENT')) {
	switch (ENVIRONMENT) {
		case 'development':
					error_reporting(1);
		break;
		case 'production':
					error_reporting(0);
		break;
		default:
					exit('The application environment is not set correctly.');
	}
}
/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" folder.
 * Include the path if the folder is not in the same  directory
 * as this file.
 *
 */
$system_path = 'core';
$application_folder = 'application';
define('BASEPATH', str_replace("\\", "/", $system_path));
// The path to the "application" folder
if (is_dir($application_folder)) {
	define('APPPATH', $application_folder.'/');
} else {
	if ( ! is_dir(BASEPATH.$application_folder.'/')) {
		exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
	}
	define('APPPATH', BASEPATH.$application_folder.'/');
}
/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * folder then the default one you can set its name here. The folder
 * can also be renamed or relocated anywhere on your server.  If
 * you do, use a full server path. 
 * 
 *
 * NO TRAILING SLASH!
 *
 */
$application_folder = 'application';
ob_clean();
require_once 'core/Anemone.php';
?>