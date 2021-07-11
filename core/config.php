<?php

/*
 * Setting session
 */
if (!session_id()) {
    session_start();
}
define('DEVELOPMENT', true);

define('DEBUG', true);
if (DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
}

/*
 * All config Index name will be capitalized
 */
$config = array();
$config['BASE_DIR'] = dirname(dirname(__FILE__));


// Change when upload to different domain //

$config['SITE_NAME'] = 'Sonawap Support Ticket';
$config['BASE_URL'] = DEVELOPMENT ? 'http://localhost/SupportTicket/' : 'https://supportticket.com/';
$config['ROOT_DIR'] = DEVELOPMENT ? '/SupportTicket/' : '/https://supportticket.com/';
$config['DB_TYPE'] = 'mysqli';
$config['DB_SERVER'] = 'localhost';
$config['DB_NAME'] = DEVELOPMENT ? 'supportticket' : '';
$config['DB_USER'] = DEVELOPMENT ? 'root' : '';
$config['DB_PASSWORD'] = DEVELOPMENT ? '' :  '';

/*
 * Give your file name as suffix it will return full base path
 * @return string
 * e.g C:\xampp\htdocs\internship/
 */

function base_path($suffix = '') {
    global $config;
    $suffix = ltrim($suffix, '/');
    return $config['BASE_DIR'] . '/' . trim($suffix);
}


/*
 * Give your file name as suffix it will return full base url
 * @return string e.g http://localhost/internship/
 */

function base_url($suffix = '') {
    global $config;
    $suffix = ltrim($suffix, '/');
    return $config['BASE_URL'] . trim($suffix);
}




?> 