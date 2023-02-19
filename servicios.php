<?php include("cabecera.php")?>
<?php include("conexion.php")?>

<?php
$objConexion = new conexion();
$infoservicios=$objConexion->consultar("SELECT * FROM `imagentablaservicios`");
?>
<div class="division-estilos"><h2>SERVICIOS</h2></div>

<div class="servicios-container">
    <div class="card-container">
        <?php foreach($infoservicios as $infoservicio) {?>
        <div class="service-card">
            <div class="imagen-container">
            <img src="imagenes/<?php echo $infoservicio['imagen']?>" alt="imagen proyecto">
            </div>
            <div class="card-text"><h2><?php echo $infoservicio['servicio']?></h2></div>
            <div class="table tabla-emotes">
                <table class="table">
                    <thead>
                        <tr>
                            <th>cantidad</th>
                            <th>precio</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td><?php echo $infoservicio['cantidad']?></td>
                    <td><?php echo $infoservicio['precio']?></td>
                    </tr>            
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?>

    </div>
</div>


</div>