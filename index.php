<?php
include_once('env.php');
include_once('config.php');

include_once ('vendor/autoload.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

if (isset($_GET['api']) && $_GET['api'] !== '') {
    if (file_exists(API_PATH . $_GET['api'] . '.php')) {
        include_once(API_PATH . $_GET['api'] . '.php');
    } else {
        echo json_encode([
            'message' => '404: File ' . $_GET['api'] . ' not found'
        ]);
    }
} else {
    http_response_code(404);
    echo json_encode([
        'message' => '404: Process not Found'
    ]);
}