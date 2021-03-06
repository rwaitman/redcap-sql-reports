<?php
/**
 * PLUGIN NAME: SQL Reporting Plugin
 * DESCRIPTION: Developed by the University of Kansas Medical Center's Medical
 *              Informatics Department to supplement REDCap's native reporting 
 *              functionality where needed.
 * VERSION: 1.0
 * AUTHOR: Michael Prittie
 */

// Retrieve REDCap global MYSQLi database connection object (REDCapism)
global $conn;

// Include the REDCap Connect file in the main "redcap" directory (REDCapism)
require_once('../../redcap_connect.php');

// Set path constants for REDCap and MI REDCap plugin framework
define('REDCAP_ROOT', realpath(dirname(__FILE__).'/../../').'/');
define('FRAMEWORK_ROOT', REDCAP_ROOT.'plugins/framework/');

require_once(FRAMEWORK_ROOT.'Plugin.php');
$plugin = new Plugin($conn, USERID);
$plugin->authorize();

$response_html = $plugin->request_to_response(
    $_GET,
    $_POST,
    $_REQUEST
);
 
// OPTIONAL: Display the project header (REDCapism)
require_once(APP_PATH_DOCROOT.'ProjectGeneral/header.php');
//Your HTML page content goes here (REDCapism)
echo $response_html;
// OPTIONAL: Display the project footer (REDCapism)
require_once(APP_PATH_DOCROOT.'ProjectGeneral/footer.php');
?>
