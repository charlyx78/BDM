<nav class="navbar navbar-expand-lg">
    <div class="container-md">
        <a class="navbar-brand" href="home.php">
            <img src="../img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex ms-lg-4 w-100" role="search">
                <div class="input-group input-group-md">
                    <input class="form-control" type="search" placeholder="Buscar producto..." aria-label="Search" aria-label="Search" aria-describedby="button-addon2">
                    <button class="input-group-text btn btn-outline-light" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
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
                    <a href="cart.php" class="nav-link w-100 link-carrito" role="button">
                        <div class="position-relative w-100 d-flex justify-content-between align-items-center">
                            <div class="d-md-none">Carrito</div>
                            <i class="bi bi-cart-dash-fill text-light"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                0
                            <span class="visually-hidden">unread messages</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown w-100 d-flex justify-content-between align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-md-none">Carlos Ruiz</div>  
                        <img src="../img/avatar.svg" class="rounded-circle me-2" width="30" height="30" alt="Avatar" />  
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mi cuenta</a></li>
                        <li><a class="dropdown-item" href="#">Mis pedidos</a></li>
                        <li><a class="dropdown-item" href="#">Wishlist</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="landingPage.php">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
    </nav>