<?php include("cabecera.php") ?>

<div class="division-estilos"><h2>COMISIONES</div>
<div class="comisiones-container row">
    <div class="comisiones-slide col-6">
        <div class="carrusel">
                <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="imagenes/1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="imagenes/2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="imagenes/3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                    </div>
                    </div>
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
                <tr>
                <th scope="row">cara</th>
                <td>$</td>
                <td>$</td>
                <td>$</td>
                <td>$</td>
                <td>$</td>
                </tr>
                <tr>
                <th scope="row">medio cuerpo</th>
                <td>$</td>
                <td>$</td>
                <td>$</td>
                <td>$</td>
                <td>$</td>
                </tr>
                <tr>
                <th scope="row">cuerpo completo</th>
                <td>$</td>
                <td>$</td>
                <td>$</td>
                <td>$</td>
                <td>$</td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>


<?php include("footer.php") ?>