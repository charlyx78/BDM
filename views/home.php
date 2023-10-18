<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendigo - Home</title>
    <?php include_once "../estilos.php" ?>
</head>
<body class="body">
    <?php include_once "navbar.php" ?>

    <section class="contenedor-home">
        <div class="contenido-home">
            <section class="hero-home">
                <div class="texto-hero-home">
                    <h5>Con <span>Trendigo</span></h5>
                    <h2>DESCUBRE EL FUTURO</h2>
                    <h6 class="mb-4">Encuentra los productos mas innovadores del momento con nosotros</h6>
                    <button class="btn btn-primario rounded-pill px-3" id="btnComprarHome">Compra ahora</button>
                </div>
            </section>
        </div>
    </section>

    <section class="container-fluid">
        <div class="modulo-home contenedor-promocion-home2">
            <div class="imagen-promocion-home2">
                <div class="contenido-imagen-promocion">
                    <h2>Realidad virtual</h2>
                    <button class="btn btn-light rounded-pill fw-bold">Conoce más</button>
                </div>
            </div>
        </div>
        
        <div class="contenedor-secciones-productos" id="contenedorProductosParaTi">
            <section class="modulo-home seccion-productos">
                <h3 class="titulo-seccion-productos mb-4">Los elegidos <span class="color-secundario">para ti</span> </h3>
                
                <div class="contenedor-productos">
                    <ul class="contenido-productos">
                        <li class="item-producto">                        
                            <a class="producto" href="producto.php">
                                <div class="imagen-producto"></div>
                                <h4 class="categoria-producto  text-secondary">Smartphones</h4>
                                <h2 class="nombre-producto">iPhone 14 Pro 128GB 4GB RAM</h2>
                                <h4 class="precio-producto">$12999</h4>
                            </a>
                        </li>
                        <li class="item-producto">                        
                            <a class="producto" href="producto.php">
                                <div class="imagen-producto"></div>
                                <h4 class="categoria-producto  text-secondary">Smartphones</h4>
                                <h2 class="nombre-producto">iPhone 14 Pro 128GB 4GB RAM</h2>
                                <h4 class="precio-producto">$12999</h4>
                            </a>
                        </li>
                        <li class="item-producto">                        
                            <a class="producto" href="producto.php">
                                <div class="imagen-producto"></div>
                                <h4 class="categoria-producto  text-secondary">Smartphones</h4>
                                <h2 class="nombre-producto">iPhone 14 Pro 128GB 4GB RAM</h2>
                                <h4 class="precio-producto">$12999</h4>
                            </a>
                        </li>
                        <li class="item-producto">                        
                            <a class="producto" href="producto.php">
                                <div class="imagen-producto"></div>
                                <h4 class="categoria-producto  text-secondary">Smartphones</h4>
                                <h2 class="nombre-producto">iPhone 14 Pro 128GB 4GB RAM</h2>
                                <h4 class="precio-producto">$12999</h4>
                            </a>
                        </li>
                    </ul>          
                </div>
                
            </section>
        </div>   
        
        <div class="modulo-home contenedor-promocion-home3">
            <div class="imagen-promocion-home3"></div>
            <div>
                <h2>Trabaja con la comodidad de una laptop</h2>
                <h4>Descubre nuestra coleccion de computadoras</h4>
                <button class="btn btn-primario rounded-pill px-4 py-2">Ver mas</button>
            </div>
        </div>

        <div class="contenedor-secciones-productos">
            <section class="modulo-home seccion-productos mb-4">
                <h3 class="titulo-seccion-productos mb-4">Lo que esta en <span class="color-secundario">tendencia</span> </h3>
                
                <div class="contenedor-productos">
                    <ul class="contenido-productos">
                        <li class="item-producto">                        
                            <a class="producto" href="producto.php">
                                <div class="imagen-producto"></div>
                                <h4 class="categoria-producto  text-secondary">Smartphones</h4>
                                <h2 class="nombre-producto">iPhone 14 Pro 128GB 4GB RAM</h2>
                                <h4 class="precio-producto">$12999</h4>
                            </a>
                        </li>
                        <li class="item-producto">                        
                            <a class="producto" href="producto.php">
                                <div class="imagen-producto"></div>
                                <h4 class="categoria-producto  text-secondary">Smartphones</h4>
                                <h2 class="nombre-producto">iPhone 14 Pro 128GB 4GB RAM</h2>
                                <h4 class="precio-producto">$12999</h4>
                            </a>
                        </li>
                        <li class="item-producto">                        
                            <a class="producto" href="producto.php">
                                <div class="imagen-producto"></div>
                                <h4 class="categoria-producto  text-secondary">Smartphones</h4>
                                <h2 class="nombre-producto">iPhone 14 Pro 128GB 4GB RAM</h2>
                                <h4 class="precio-producto">$12999</h4>
                            </a>
                        </li>
                        <li class="item-producto">                        
                            <a class="producto" href="producto.php">
                                <div class="imagen-producto"></div>
                                <h4 class="categoria-producto  text-secondary">Smartphones</h4>
                                <h2 class="nombre-producto">iPhone 14 Pro 128GB 4GB RAM</h2>
                                <h4 class="precio-producto">$12999</h4>
                            </a>
                        </li>
                    </ul>          
                </div>
                
            </section>
        </div>   

        <div class="contenedor-secciones-categorias">
            <section class="modulo-home seccion-categorias">
                <h3 class="titulo-seccion-productos mb-4">Mas de <span class="color-secundario">Trendigo</span> </h3>
                
                <div class="contenedor-categorias">
                    <ul class="contenido-categorias">
                        <li class="item-categoria">                        
                            <div class="categoria">
                                <div class="imagen-categoria" style="background-image: url(../img/categoria-dron.jpg);">
                                    <div class="contenido-categoria">
                                        <h2>Drones</h2>
                                        <button class="btn btn-light rounded-pill fw-bold">Ver mas</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item-categoria">                        
                            <div class="categoria">
                                <div class="imagen-categoria" style="background-image: url(../img/laptop.jpg);">
                                    <div class="contenido-categoria">
                                        <h2>Laptops</h2>
                                        <button class="btn btn-light rounded-pill fw-bold">Ver mas</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item-categoria">                        
                            <div class="categoria">
                                <div class="imagen-categoria" style="background-image: url(../img/categoria-dron.jpg);">
                                    <div class="contenido-categoria">
                                        <h2>Drones</h2>
                                        <button class="btn btn-light rounded-pill fw-bold">Ver mas</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item-categoria">                        
                            <div class="categoria">
                                <div class="imagen-categoria" style="background-image: url(../img/laptop.jpg);">
                                    <div class="contenido-categoria">
                                        <h2>Laptops</h2>
                                        <button class="btn btn-light rounded-pill fw-bold">Ver mas</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>          
                </div>
                
            </section>
        </div>  
        
        <div class="contenedor-secciones-productos">
            <section class="modulo-home seccion-productos">
                <h3 class="titulo-seccion-productos mb-4">Lo mas <span class="color-secundario">nuevo</span> </h3>
                
                <div class="contenedor-productos">
                    <ul class="contenido-productos">
                        <li class="item-producto">                        
                            <a class="producto" href="producto.php">
                                <div class="imagen-producto"></div>
                                <h4 class="categoria-producto  text-secondary">Smartphones</h4>
                                <h2 class="nombre-producto">iPhone 14 Pro 128GB 4GB RAM</h2>
                                <h4 class="precio-producto">$12999</h4>
                            </a>
                        </li>
                        <li class="item-producto">                        
                            <a class="producto" href="producto.php">
                                <div class="imagen-producto"></div>
                                <h4 class="categoria-producto  text-secondary">Smartphones</h4>
                                <h2 class="nombre-producto">iPhone 14 Pro 128GB 4GB RAM</h2>
                                <h4 class="precio-producto">$12999</h4>
                            </a>
                        </li>
                        <li class="item-producto">                        
                            <a class="producto" href="producto.php">
                                <div class="imagen-producto"></div>
                                <h4 class="categoria-producto  text-secondary">Smartphones</h4>
                                <h2 class="nombre-producto">iPhone 14 Pro 128GB 4GB RAM</h2>
                                <h4 class="precio-producto">$12999</h4>
                            </a>
                        </li>
                        <li class="item-producto">                        
                            <a class="producto" href="producto.php">
                                <div class="imagen-producto"></div>
                                <h4 class="categoria-producto  text-secondary">Smartphones</h4>
                                <h2 class="nombre-producto">iPhone 14 Pro 128GB 4GB RAM</h2>
                                <h4 class="precio-producto">$12999</h4>
                            </a>
                        </li>
                    </ul>          
                </div>
                
            </section>
        </div>   
    </section>

    <?php include_once "footer.php" ?>

    <script src="../js/home.js"></script>

</body>
</html>