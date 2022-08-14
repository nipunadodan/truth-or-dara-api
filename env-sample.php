<?php
//DB
define('DB','truthordare');
define('DB_HOST','localhost');
define('DB_USER','');
define('DB_PASSWORD','');
define('DB_PREFIX','td_');

define('PRODUCTION', true);

/* Display PHP error */
if(!PRODUCTION){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
