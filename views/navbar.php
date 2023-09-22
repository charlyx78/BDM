<nav class="navbar navbar-fixed navbar-expand-lg" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">
            <img src="../img/Trendigo logo.png" alt="Logo" height="30" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Tecnologia</a></li>
                        <li><a class="dropdown-item" href="#">Electrodomesticos</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="misProductos.php" class="nav-link w-100 link-carrito" role="button">Productos</a>
                </li> -->
                <form class="d-flex w-100" role="search">
                    <div class="input-group input-group-md rounded-pill">
                        <input class="form-control text-secondary" type="search" placeholder="Buscar producto..." aria-label="Search" aria-label="Search" aria-describedby="button-addon2">
                        <a class="input-group-text btn-primario" id="button-addon2" href="search.php"><i class="bi bi-search"></i></a>
                    </div>
                </form>
                <li class="nav-item">
                    <a href="chat.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                        <i class="bi bi-chat-left color-primario me-3 me-lg-0"></i>    
                        <div class="d-md-none">Mensajes</div>  
                    </a>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                        <i class="bi bi-bag color-primario me-3 me-lg-0"></i>
                        <div class="d-md-none">Carrito de compras</div>  
                    </a>
                </li>

                <li class="nav-item dropstart d-none d-lg-block">
                    <a class="nav-link dropdown btn btn-light w-100 d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle color-primario"></i>
                        <!-- <img src="../img/avatar.svg" class="me-2" width="30" height="30" alt="Avatar" />   -->
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="account.php">Mi cuenta</a></li>
                        <li><a class="dropdown-item" href="pedidos.php">Mis pedidos</a></li>
                        <li><a class="dropdown-item" href="wishlist.php">Wishlist</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="landingPage.php">Cerrar sesion</a></li>
                    </ul>
                </li>

                <li class="nav-item d-sm-block d-lg-none mb-0">
                    <a class="nav-link btn btn-light w-100 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-circle color-primario me-3"></i>
                            <div class="d-md-none">Hola, Carlos Ruiz!</div>  
                        </div>
                        <i class="bi bi-plus color-primario"></i>
                        <!-- <img src="../img/avatar.svg" class="me-2" width="30" height="30" alt="Avatar" />   -->
                    </a>
                </li>
                <div class="collapse d-lg-none" id="collapseExample">
                    <li class="nav-item">
                        <a href="account.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                            <div class="d-md-none">Mi cuenta</div>  
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pedidos.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                            <div class="d-md-none">Mis pedidos</div>  
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="wishlist.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                            <div class="d-md-none">Wishlist</div>  
                        </a>
                    </li>
                    <li class="nav-item mb-5">
                        <a href="landingPage.php" class="nav-link btn btn-light w-100 d-flex align-items-center" role="button">
                            <div class="d-md-none text-danger">Cerrar sesion</div>  
                        </a>
                    </li>
                    <!-- <div class="list-group border-0 p-0">
                        <a class="list-group-item list-group-item-action" href="account.php">Mi cuenta</a>
                        <a class="list-group-item list-group-item-action" href="pedidos.php">Mis pedidos</a>
                        <a class="list-group-item list-group-item-action" href="wishlist.php">Wishlist</a>
                        <a class="list-group-item list-group-item-action text-danger" href="landingPage.php">Cerrar sesion</a>
                    </div> -->
                </div>
            </ul>

        </div>
    </div>
</nav>

<script src="../js/navbar.js"></script>
