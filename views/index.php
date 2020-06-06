
 

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="public/css/login.css">
  <link rel="stylesheet" href="../public/css/login.css">
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="public/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="../public/css/argon.css?v=1.2.0" type="text/css">
  
  
  
  <title>ClienteManager</title>
</head>

<body>


<!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="public/images/logo.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="/ClientManager/">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">INICIO  </span>
              </a>
            </li>

        
            
          
            
            
        <li class="nav-item">
          <ul>
            <li class="nav-item dropdown">
               <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mb-0 text-sm  font-weight-bold">Administrar Usuarios</span> 
              </a>
              <?php if ($_SESSION['idrol'] == 1){ ?>
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="/ClientManager/Users/add" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Nuevo Usuario</span>
                </a>
              <?php } ?>

                 <div class="dropdown-divider"></div>
                <a href="/ClientManager/Users/" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Listar Usuarios</span>
                </a>
              </div>
            </li>
           </ul>
          </li>


          <li class="nav-item">
          <ul>
            <li class="nav-item dropdown">
               <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mb-0 text-sm  font-weight-bold">Clientes</span> 
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="/ClientManager/Customers/add" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Nuevo Cliente</span>
                </a>
                 <div class="dropdown-divider"></div>
                <a href="/ClientManager/Customers/" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Listar Clientes</span>
                </a>
              </div>
            </li>
           </ul>
          </li>

          <li class="nav-item">
          <ul>
            <li class="nav-item dropdown">
               <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mb-0 text-sm  font-weight-bold">Proveedores</span> 
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="/ClientManager/Suppliers/add" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Nuevo Proveedor</span>
                </a>
                 <div class="dropdown-divider"></div>
                <a href="/ClientManager/Suppliers/" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Listar Proveedores</span>
                </a>
              </div>
            </li>
           </ul>
          </li>


          <li class="nav-item">
          <ul>
            <li class="nav-item dropdown">
               <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mb-0 text-sm  font-weight-bold">Empleados</span> 
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="/ClientManager/Employees/add" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Nuevo Empleado</span>
                </a>
                 <div class="dropdown-divider"></div>
              
                <a href="/ClientManager/Employees/" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Listar Empleados</span>
                </a>
                
              </div>
            </li>
           </ul>
          </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Siguenos en</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Facebook</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" target="_blank">
                <i class="ni ni-palette"></i>
                <span class="nav-link-text">Instagram</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" target="_blank">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">twitter</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Linkedin</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active active-pro" href="examples/upgrade.html">
                <i class="ni ni-send text-dark"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar fixed-top navbar-top navbar-expand navbar-dark bg-primary border-bottom" style="background-color: black !important;">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendario</small>
                  </a>
                  
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reportes</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="public/uploads/FOTO.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Sebashdm</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Bienvenido!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Mi perfil</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Configuracion</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Actividad</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Soporte</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="/ClientManager/logout" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Salir</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid" style="background-color: #38B6FF !important;">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row" style="background-color: #38B6FF !important;">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Usuarios</h5>
                      <span class="h2 font-weight-bold mb-0">250</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 2 nuevos</span>
                    <span class="text-nowrap">en el ultimo mes</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">PROVEEDORES</h5>
                      <span class="h2 font-weight-bold mb-0">50</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient- text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>5 nuevos</span>
                    <span class="text-nowrap">en el ultimo mes</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">CLIENTES</h5>
                      <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>86 nuevos</span>
                    <span class="text-nowrap">en el ultimo mes</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">EMPLEADOS</h5>
                      <span class="h2 font-weight-bold mb-0">320</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>10 nuevos</span>
                    <span class="text-nowrap">en el ultimo mes</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    
    <style>
      #map {
	height: 500px;
	width: 100%;
}
      </style>
  
  <div id ="map"></div>
  
  
  
      <!-- Footer -->
      <footer class="footer pt-0" >
        <div class="row align-items-center justify-content-lg-between">
          
          <div class="col-lg-12" style="background-color: black !important;">
            <ul class="nav nav-footer justify-content-center">
              <li class="nav-item">
            
                <a href="#!" class="nav-link" target="_blank">Desarrollado por Sebastian Hernandez</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
      
      <script>
   class Localizacion{
        constructor(callback){
        if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition((position)=>{
          this.latitude  = position.coords.latitude;
          this.longitude  = position.coords.longitude;
          callback();
        });

    }else{
        alert("ek navegador no soporta geilocalizacion")
    }
  }
}



     function iniciarMap(){
       const ubicacion = new Localizacion(()=>{

        const options = {
          center: {
            lat: ubicacion.latitude,
            lng: ubicacion.longitude
          },
          zoom: 15
        }

        var map = document.getElementById('map');
        const mapa = new google.maps.Map(map, options);

       });
     }

     

      </script>

  

 
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClaiaZJbVoeifCnySf6n-K-zOVkUzhDCo&callback=iniciarMap"></script>
  <script src="script.js"></script>
 

  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-3.2.1.js"></script>

    
</body>

</html>

