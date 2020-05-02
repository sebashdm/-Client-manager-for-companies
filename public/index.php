<?php

ini_set('display_error',1);
ini_set('display_starup_error',1);
error_reporting(E_ALL); //...............PARA INICIALIZAR ERRORES !! 

require_once '../vendor/autoload.php';

session_start();


use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'clientmanagerbd',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();


// implementacion de diactoros para las peticiones con las variables Su perglobales lo que me permite ahorrar codigo
$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals( 
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

// aca se maperon las rutas del proyecto gracias a la libreria de Aura Router
// Lo que me permite acceder a las paginas con una direccion que yo establesco y no 
//directamente con el nombre del archivo.php

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$map->get('index','/ClientManager/',[
    'controller'=> 'app\Controllers\IndexController',
    'action' => 'indexAction'
]);

$map->get('saveProducts','/ClientManager/Products/add',[
    'controller'=> 'app\Controllers\ProductsController',
    'action' => 'getAddProductAction'
]);

$map->post('addProducts','/ClientManager/Products/add',[
    'controller'=> 'app\Controllers\ProductsController',
    'action' => 'getAddProductAction'
]);

$map->get('saveCustomers','/ClientManager/Customers/add',[
    'controller'=> 'app\Controllers\CustomersController',
    'action' => 'getAddCustomerAction'
]);

$map->post('addCustomers','/ClientManager/Customers/add',[
    'controller'=> 'app\Controllers\CustomersController',
    'action' => 'getAddCustomerAction'
]);

$map->get('saveSuppliers','/ClientManager/Suppliers/add',[
    'controller'=> 'app\Controllers\SuppliersController',
    'action' => 'getAddSupplierAction'
]);

$map->post('addSuppliers','/ClientManager/Suppliers/add',[
    'controller'=> 'app\Controllers\SuppliersController',
    'action' => 'getAddSupplierAction'
]);

$map->get('saveUsers','/ClientManager/Users/add',[
    'controller'=> 'app\Controllers\UsersController',
    'action' => 'getAddUsersAction'
]);

$map->post('addUsers','/ClientManager/Users/add',[
    'controller'=> 'app\Controllers\UsersController',
    'action' => 'getAddUsersAction'
]);

$map->get('loginForm','/ClientManager/login',[
    'controller'=> 'app\Controllers\AuthController',
    'action' => 'getLogin'
]);

$map->get('logout','/ClientManager/logout',[
    'controller'=> 'app\Controllers\AuthController',
    'action' => 'getLogout'
]);

$map->post('auth','/ClientManager/auth',[
    'controller'=> 'app\Controllers\AuthController',
    'action' => 'postLogin'
]);

$map->get('admin','/ClientManager/admin',[
    'controller'=> 'app\Controllers\AdminController',
    'action' => 'getIndex',
    'auth' => true
]);



$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);


if(!$route){
    echo 'No Found';
}else{
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    $needsAuth = $handlerData['auth'] ?? false;

    $sessionUserCedula  = $_SESSION['cedula'] ?? null;
    if( $needsAuth && !$sessionUserCedula){
       header('location: /Proyecto_php/login');
      die;
    }

    $controller = new  $controllerName;
    $response = $controller->$actionName($request);

    foreach ($response->getHeaders() as $name => $values) {
      
          foreach ($values as $value) {
            header(sprintf('%s: %s',$name ,$value), false); 
          }
    }
    http_response_code($response->getStatusCode());
    echo $response->getBody();
    
}








	