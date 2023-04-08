<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require __DIR__ . '/inc/bootstrap.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

require PROJECT_ROOT_PATH . "Controller/Api/userController.php";
require PROJECT_ROOT_PATH . "Controller/Api/ArticleController.php";

$objFeedController = new UserController();
$ArticleController = new ArticleController();

switch ($uri[1]) {
    case "user":
        $objFeedController->setAction(implode(array_slice($uri, 2)));
        $objFeedController->listAction();
        break;
    case "article":
        $ArticleController->setAction(implode(array_slice($uri, 2)));
        $ArticleController->listAction();
        break;
}
?>