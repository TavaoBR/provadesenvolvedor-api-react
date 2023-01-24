<?php

use Api\Controller\ApiService;

include_once("controller/api.php");
include_once("model/api_rest.php");
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');



$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$api = new ApiService();

switch($url)
{
   case '/api/php-react/':

    $method = $_SERVER['REQUEST_METHOD'];

    if($method === "GET"){
     
        $api->get();
        
    }

   break; 

   default:
     header("Location: /api/php-react/");
   break;
}

        
    




?>