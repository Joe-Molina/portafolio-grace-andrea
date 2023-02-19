<?php include('conexion.php')?>
<?php include("cabecera.php");
$objConexion = new conexion();
$fotosComisiones=$objConexion->consultar("SELECT * FROM `imagencomisiones`");
$tablaComisiones=$objConexion->consultar("SELECT * FROM `tablacomisiones`");
?>

<div class="division-estilos"><h2>COMISIONES</h2></div>
<div class="comisiones-container row">
    <div class="comisiones-slide col-6">
        <div class="carrusel">

                <div id="carouselExampleCaptions" class="carousel slide">

                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                                <img src="imagenes/1.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                </div>
                        </div>
                    <?php foreach($fotosComisiones as $fotoComisiones) {?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="imagenes/<?php echo $fotoComisiones['imagen'];?>" alt="tumama">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo $fotoComisiones['descripcion']?></h5>
                            </div>
                            </div>           
                            <?php } ?>
                    </div>
                    
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>

        </div>
    </div>
    <div class="comisiones-tabla col-6">
        <div class="tabla">
            <table class="table caption-top">
            <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col">Mi estilo</th>
                <th scope="col">con lineart</th>
                <th scope="col">Cartoon</th>
                <th scope="col">chibis</th>
                <th scope="col">sketchs</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tablaComisiones as $tablafilasComisiones) {?>
                <tr>
                <th><?php echo $tablafilasComisiones['parte del cuerpo']?></th>
                <td><?php echo $tablafilasComisiones['mi estilo']?></td>
                <td><?php echo $tablafilasComisiones['con line art']?></td>
                <td><?php echo  $tablafilasComisiones['chibi']?></td>
                <td><?php echo $tablafilasComisiones['cartoon']?></td>
                <td><?php echo $tablafilasComisiones['sketchs']?></td>
                </tr>
                <?php } ?>

            </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("footer.php") ?>