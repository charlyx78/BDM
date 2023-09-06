<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once "../estilos.php" ?>
</head>
<body>
    <?php include_once "navbar.php" ?>

    <main class="container py-5">
        <div class="contenedor-producto">
            <div class="multimedia-producto">
                <video class="video-producto rounded" src="../img/video-producto.mp4" controls autoplay muted loop></video>
                <div class="contenedor-imagenes-producto">
                    <div class="imagen-producto rounded"></div>
                    <div class="imagen-producto rounded"></div>
                    <div class="imagen-producto rounded"></div>
                </div>
            </div>
            <div class="informacion-producto">
                <h2 class="nombre-producto">iPhone 14 Pro</h2>
                <div class="d-flex justify-content-between align-items-end precio-calificacion">
                    <h2 class="precio-producto">$12999.99</h2>
                    <h5><i class="bi bi-star-fill color-oro me-2"></i>4.9</h5>
                </div>
                <h5 class="disponibilidad-producto mb-4">Unidades disponibles: <span>65</span> </h5>
                <form action="">
                    <div class="d-flex align-items-end gap-3 mb-3">
                        <label for="cantidad-producto" class="form-label">Cantidad</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-10">                
                            <button type="submit" class="btn btn-primario w-100">Agregar al carrito</button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-terciario w-100"><i class="bi bi-bookmark-star-fill"></i></button>
                        </div>
                    </div>
                </form>
                <div class="hr"></div>
                <div class="descripcion-producto">
                    <h5 class="fw-bold mb-4">Descripcion</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia reprehenderit eos repellendus error tenetur, quo praesentium tempore neque incidunt sapiente! Laudantium error voluptas tempore quos laboriosam aut, officia neque eveniet! Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, ea omnis quidem, odit nobis neque modi cum corrupti reiciendis, voluptate adipisci laudantium! Voluptas veniam tempora quis excepturi expedita illo dolores? Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis ullam neque aut incidunt itaque facere aperiam atque temporibus, tempora laboriosam omnis perspiciatis, provident a nam labore dicta pariatur dolorem aliquid? Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt autem veniam, consequuntur provident ipsum maiores commodi adipisci dolorum quaerat delectus corrupti dolorem. Placeat fugit illum optio reiciendis exercitationem unde suscipit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, facilis in error dolore aperiam ad minima beatae exercitationem eveniet explicabo maiores ullam, ipsam consectetur nemo nisi eaque vitae quaerat magni.</p>
                </div>
            </div>
            <div class="hr"></div>
            <div class="comentarios-producto">
                <h5 class="fw-bold mb-4">Comentarios</h5>
                <div class="comentario card card-body border-0 bg-blanco">
                    <div class="usuario-comentario d-flex align-items-center gap-3 mb-2">
                        <img src="../img/avatar.svg" width="35" alt="">
                        <div class="">
                            <h6 class="m-0">Mario Fernando Salinas Cavazos</h6>
                            <p class="fecha-comentario text-secondary m-0">05/09/2023 11:20</p>
                        </div>
                    </div>
                    <p class="comentario-texto m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, recusandae commodi tenetur sint quo, minus quam minima officiis aspernatur accusamus perferendis est at itaque ea vel, nam asperiores voluptatem consequatur.</p>
                </div>
            </div>
        </div>
    </main>
    
    
</body>
</html>