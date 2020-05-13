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
    'action' => 'indexAction',
    'auth' => true // ruta requiere autenticacion

]);

$map->get('viewEmployess','/ClientManager/Employees/',[
    'controller'=> 'app\Controllers\ViewEmployeesController',
    'action' => 'ViewEmployeesAction',
    'auth' => true
]);

$map->get('viewCustomers','/ClientManager/Customers/',[
    'controller'=> 'app\Controllers\ViewCustomersController',
    'action' => 'ViewCustomersAction',
    'auth' => true
]);

$map->get('viewUsers','/ClientManager/Users/',[
    'controller'=> 'app\Controllers\ViewUsersController',
    'action' => 'ViewUsersAction',
    'auth' => true
]);


$map->get('viewSuppliers','/ClientManager/Suppliers/',[
    'controller'=> 'app\Controllers\ViewSuppliersController',
    'action' => 'ViewSuppliersAction',
    'auth' => true
]);


$map->post('DeleteCustomers','/ClientManager/Customers/',[
    'controller'=> 'app\Controllers\ViewCustomersController',
    'action' => 'destroy',
    'auth' => true
]);

$map->post('EditCustomers','/ClientManager/Customers/edit',[
    'controller'=> 'app\Controllers\EditCustomersController',
    'action' => 'edit',
    'auth' => true
]);

$map->post('EditSupplier','/ClientManager/Suppliers/edit',[
    'controller'=> 'app\Controllers\EditSuppliersController',
    'action' => 'edit',
    'auth' => true
]);

$map->post('DeleteSuppliers','/ClientManager/Suppliers/',[
    'controller'=> 'app\Controllers\ViewSuppliersController',
    'action' => 'destroy',
    'auth' => true
]);


$map->get('saveProducts','/ClientManager/Products/add',[
    'controller'=> 'app\Controllers\ProductsController',
    'action' => 'getAddProductAction',
    'auth' => true
]);

$map->post('addProducts','/ClientManager/Products/add',[
    'controller'=> 'app\Controllers\ProductsController',
    'action' => 'getAddProductAction',
    'auth' => true
]);

$map->get('saveCustomers','/ClientManager/Customers/add',[
    'controller'=> 'app\Controllers\CustomersController',
    'action' => 'getAddCustomerAction',
    'auth' => true
]);


$map->post('updateCustomers','/ClientManager/Customers/update',[
    'controller'=> 'app\Controllers\CustomersController',
    'action' => 'getUpdateCustomerAction',
    'auth' => true
]);

$map->post('updateSupplier','/ClientManager/Suppliers/update',[
    'controller'=> 'app\Controllers\SuppliersController',
    'action' => 'getUpdateSupplierAction',
    'auth' => true
]);

$map->post('addCustomers','/ClientManager/Customers/add',[
    'controller'=> 'app\Controllers\CustomersController',
    'action' => 'getAddCustomerAction',
    'auth' => true
]);

$map->get('saveEmployees','/ClientManager/Employees/add',[
    'controller'=> 'app\Controllers\EmployeesController',
    'action' => 'getAddEmployeeAction',
    'auth' => true
]);

$map->post('addEmployees','/ClientManager/Employees/add',[
    'controller'=> 'app\Controllers\EmployeesController',
    'action' => 'getAddEmployeeAction',
    'auth' => true
]);

$map->get('saveSuppliers','/ClientManager/Suppliers/add',[
    'controller'=> 'app\Controllers\SuppliersController',
    'action' => 'getAddSupplierAction',
    'auth' => true
]);

$map->post('addSuppliers','/ClientManager/Suppliers/add',[
    'controller'=> 'app\Controllers\SuppliersController',
    'action' => 'getAddSupplierAction',
    'auth' => true
]);

$map->get('saveUsers','/ClientManager/Users/add',[
    'controller'=> 'app\Controllers\UsersController',
    'action' => 'getAddUsersAction',
    'auth' => true
]);

$map->post('addUsers','/ClientManager/Users/add',[
    'controller'=> 'app\Controllers\UsersController',
    'action' => 'getAddUsersAction',
    'auth' => true
]);

$map->get('loginForm','/ClientManager/login',[
    'controller'=> 'app\Controllers\AuthController',
    'action' => 'getLogin',
    
]);

$map->get('logout','/ClientManager/logout',[
    'controller'=> 'app\Controllers\AuthController',
    'action' => 'getLogout',
    'auth' => true
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
    $handlerData = $route->handler; // trae los datos que definimos desde el mapa de rutas 
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    $needsAuth = $handlerData['auth'] ?? false; // si la ruta no esta definida coloca false

    $sessionUserCedula  = $_SESSION['documento'] ?? null;
    if( $needsAuth && !$sessionUserCedula){
       header('location: /ClientManager/login');
      die;
    }

    $controller = new  $controllerName;
    $response = $controller->$actionName($request);

    foreach ($response->getHeaders() as $name => $values) {
      
          foreach ($values as $value) {
            header(sprintf('%s: %s',$name ,$value), false); 
          }
    }
    http_response_code($response->getStatusCode());// perimite establecer el codigo de respuesta que vamos a enviar ejmmm cod 200, 404, 500
    echo $response->getBody();
    
}









	