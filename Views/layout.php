<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function MostrarNav()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    echo
    '<aside class="sidebar-nav-wrapper">
                <div class="navbar-logo">
                    <a href="../vHome/inicio.php">
                    <img src="../assets/images/logo.svg" alt="logo" />
                    </a>
                </div>

                <nav class="sidebar-nav">
                    <ul>';

                    if (isset($_SESSION["ConsecutivoRol"]) && $_SESSION["ConsecutivoRol"] == 1) 
                    {
                        echo '<li class="nav-item">
                                <a href="../vProducto/consultarProductos.php">
                                <span class="icon">
                                    <i class="fas fa-box" style="font-size: 20px;"></i>
                                </span>
                                <span class="text">Productos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../vAdmin/consultarDatos.php">
                                <span class="icon">
                                    <i class="fas fa-chart-bar" style="font-size: 20px;"></i>
                                </span>
                                <span class="text">Información</span>
                                </a>
                            </li>';
                    }
                    else
                    {
                        echo '<li class="nav-item">
                                <a href="../vCarrito/consultarCarrito.php">
                                <span class="icon">
                                    <i class="fas fa-shopping-cart" style="font-size: 20px;"></i>
                                </span>
                                <span class="text">Mi Carrito</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../vCarrito/consultarCompras.php">
                                <span class="icon">
                                    <i class="fas fa-tags" style="font-size: 20px;"></i>
                                </span>
                                <span class="text">Mis Compras</span>
                                </a>
                            </li>';
                    }

                    echo '</ul>
                </nav>
            </aside>';
}

function MostrarHeader()
{
    $nombreUsuario = "";
    $nombreRol = "";
    $totalCantidad = 0;
    $totalPago = 0.00;

    if (isset($_SESSION["NombreUsuario"])) {
        $nombreUsuario = $_SESSION["NombreUsuario"];
        $nombreRol = $_SESSION["NombreRol"];
        $totalCantidad = number_format($_SESSION["TotalCantidad"], 0) ;
        $totalPago = number_format($_SESSION["TotalPago"], 2);
    } else {
        header("Location: login.php");
        exit();
    }

    echo
    '<header class="header">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6">
                    <div class="header-left d-flex align-items-center">
                        <div class="menu-toggle-btn mr-15">
                        <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                            <i class="lni lni-chevron-left me-2"></i>
                        </button>
                        </div>
                        
                        <i class="fa fa-tags me-2"></i> ' . $totalCantidad . ' productos - Total: ₡' .  $totalPago . '

                    </div>
                    </div>
                    
                    <div class="col-lg-7 col-md-7 col-6">
                    <div class="header-right">             
                        <div class="profile-box ml-15">
                        <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-info">
                            <div class="info d-flex align-items-center gap-3">
                                <div class="profile-avatar bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width: 45px; height: 45px; font-size: 18px; flex-shrink: 0;">
                                    ' . strtoupper(substr($nombreUsuario, 0, 1)) . '
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-600">' . htmlspecialchars($nombreUsuario) . '</h6>
                                    <p class="mb-0 text-muted small d-flex align-items-center gap-1">
                                        <i class="lni lni-shield-check" style="font-size: 12px;"></i>
                                        ' . htmlspecialchars($nombreRol) . '
                                    </p>
                                </div>
                            </div>
                            </div>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                            <li>
                                <a href="../vSeguridad/cambiarPerfil.php">
                                    <i class="lni lni-user"></i> Perfil
                                </a>
                            </li>                    
                            <li>
                                <a href="../vSeguridad/cambiarAcceso.php"> 
                                    <i class="lni lni-cog"></i> Seguridad 
                                </a>
                            </li>
                            <li>
                                <a href="#0" onclick="CerrarSesion()">
                                    <i class="lni lni-exit"></i> Cerrar Sesión
                                </a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </header>';
}

function MostrarFooter()
{
    echo
    '<footer class="footer">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                    <div class="copyright text-center text-md-start">
                        <p class="text-sm">
                        Designed and Developed by MN WEB
                        </p>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="terms d-flex justify-content-center justify-content-md-end">
                        <a href="#0" class="text-sm">Term & Conditions</a>
                        <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
                    </div>
                    </div>
                </div>
                </div>
            </footer>';
}

function MostrarCSS()
{
    echo
    '<head>
                <meta charset="UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>Blank Page | PlainAdmin Demo</title>

                <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
                <link rel="stylesheet" href="../assets/css/lineicons.css" />
                <link rel="stylesheet" href="../assets/css/materialdesignicons.min.css" />
                <link rel="stylesheet" href="../assets/css/fullcalendar.css" />
                <link rel="stylesheet" href="../assets/css/main.css" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
                <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.bootstrap5.css" />
            </head>';
}

function MostrarJS()
{
    echo
    '<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/Chart.min.js"></script>
        <script src="../assets/js/dynamic-pie-chart.js"></script>
        <script src="../assets/js/moment.min.js"></script>
        <script src="../assets/js/fullcalendar.js"></script>
        <script src="../assets/js/jvectormap.min.js"></script>
        <script src="../assets/js/world-merc.js"></script>
        <script src="../assets/js/polyfill.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="../assets/funciones/cerrarSesion.js"></script>
        <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.3.7/js/dataTables.bootstrap5.js"></script>
        ';
}
