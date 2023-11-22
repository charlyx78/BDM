<nav class="navbar navbar-fixed navbar-expand-lg" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">
            <img src="../img/Trendigo-logo.png" alt="Logo" height="30" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <!-- Buscador Navbar -->
                <form class="d-flex w-100" id="formBusquedaProducto" role="search">
                    <div class="input-group input-group-md rounded-pill">
                        <input class="form-control text-secondary" name="campoBusqueda" id="campoBusqueda" type="search" placeholder="Buscar producto..." aria-label="Search" aria-label="Search" aria-describedby="button-addon2">
                        <button type="submit" name="busquedaProducto" class="input-group-text btn-primario" id="button-addon2" href="search.php"><i class="bi bi-search"></i></button>
                    </div>
                </form>
                <!-- Item Mensajes Celular -->
                <li class="nav-item d-block d-md-none">
                    <a href="contactos.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                        <i class="bi bi-chat-left color-primario me-3 me-lg-0"></i>    
                        <div class="d-md-none">Mensajes</div>  
                    </a>
                </li>
                <!-- Item Mensajes Tablet y Laptop -->
                <li class="nav-item d-none d-md-block">
                    <a href="chat.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                        <i class="bi bi-chat-left color-primario me-3 me-lg-0"></i>    
                        <div class="d-lg-none">Mensajes</div>  
                    </a>
                </li>
                <!-- Item Carrito -->
                <li class="nav-item">
                    <a href="cart.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                        <i class="bi bi-bag color-primario me-3 me-lg-0"></i>
                        <div class="d-lg-none">Carrito de compras</div>  
                    </a>
                </li>
                <!-- DropDown Menu Laptop -->
                <li class="nav-item dropstart d-none d-lg-block">
                    <a class="nav-link dropdown btn btn-light w-100 d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['UsuNombre']?><i class="bi bi-person-circle ms-3 color-primario"></i> 
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="account.php">Mi cuenta</a></li>
                        
                        <?php
                            // Pantallas De Cliente
                            if($_SESSION['UsuRol'] == 'Cliente') {
                               echo 
                                '<li><a class="dropdown-item" href="pedidos.php">Mis pedidos</a></li>
                                <li><a class="dropdown-item" href="wishlist.php">Wishlist</a></li>'; 
                            }
                            // Pantallas De Vendedor
                            else if($_SESSION['UsuRol'] == 'Vendedor') {
                                echo
                                '<li><a class="dropdown-item" href="categorias.php">Categorias</a></li>
                                <li><a class="dropdown-item" href="misProductos.php">Mis productos</a></li>
                                <li><a class="dropdown-item" href="wishlist.php">Wishlist</a></li>
                                <li><a class="dropdown-item" href="ventas.php">Reporte Ventas</a></li>'; 
                            }
                            // Pantallas De Administrador
                            else if($_SESSION['UsuRol'] == 'Admin') {
                                echo
                                '<li><a class="dropdown-item" href="categorias.php">Categorias</a></li>
                                <li><a class="dropdown-item" href="gestionProductos.php">Gestión de productos</a></li>';
                            }
                        ?>

                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="../index.php">Cerrar sesion</a></li>
                    </ul>
                </li>
                <!-- Boton Desplegable Celular -->
                <li class="nav-item d-sm-block d-lg-none mb-0">
                    <a class="nav-link btn btn-light w-100 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-circle color-primario me-3"></i>
                            <div class="d-lg-none">Hola, Carlos Ruiz!</div>  
                        </div>
                        <i class="bi bi-plus color-primario"></i>
                    </a>
                </li>
                <div class="collapse d-lg-none" id="collapseExample">
                    
                    <?php
                        // Pantallas De Cliente
                        if($_SESSION['UsuRol'] == 'Cliente') {
                            echo 
                            '<li class="nav-item">
                                <a href="pedidos.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                                    <div class="d-md-none">Mis pedidos</div>  
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="wishlist.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                                    <div class="d-md-none">Wishlist</div>  
                                </a>
                            </li>';
                        }
                        // Pantallas De Vendedor
                        else if($_SESSION['UsuRol'] == 'Vendedor') {
                            echo
                            '<li class="nav-item">
                                <a href="misProductos.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                                    <div class="d-md-none">Mis productos</div>  
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="wishlist.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                                    <div class="d-md-none">Wishlist</div>  
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="ventas.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                                    <div class="d-md-none">Reporte Ventas</div>  
                                </a>
                            </li>';
                        }
                        // Pantallas De Administrador
                        else if($_SESSION['UsuRol'] == 'Admin') {
                            echo 
                            '<li class="nav-item">
                                <a href="categorias.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                                    <div class="d-md-none">Categorias</div>  
                                </a>
                                <a href="gestionProductos.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                                    <div class="d-md-none">Gestión de productos</div>  
                                </a>
                            </li>';
                        }
                    ?>

                    <li class="nav-item">
                        <a href="account.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                            <div class="d-md-none">Mi cuenta</div>  
                        </a>
                    </li>

                    <li class="nav-item mb-5">
                        <a href="../index.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                            <div class="d-md-none text-danger">Cerrar sesion</div>  
                        </a>
                    </li>
                </div>
            </ul>

        </div>
    </div>
</nav>

<script src="../js/navbar.js"></script>
