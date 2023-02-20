<?php include("conexion.php") ?>
<?php include("cabecera.php") ?>
<?php 
$objConexion = new conexion();
$fotosProyectos=$objConexion->consultar("SELECT * FROM `imagenproyectos`");
?>
<div class="division-estilos"><h2>PROYECTOS</h2></div>
<div class="proyectos-container">

    <div class="galeria_container">

        <?php foreach($fotosProyectos as $fotoProyecto) {?>
            <div class="foto-container">
            <img src="imagenes/<?php echo $fotoProyecto['imagen']?>" alt="proyecto">
            </div>
                <?php } ?>

    </div>
    
</div>

<?php include("footer.php") ?>