<?php include("conexion.php");?>

<?php    
    if($_POST){
        //foto proyectos
        $fecha= new DateTime();
        $imagenProyectos=$fecha->getTimestamp()."_".$_FILES['ImagenProyectos']['name'];
        $imagenProyectos_temporal=$_FILES['ImagenProyectos']['tmp_name'];
        move_uploaded_file($imagenProyectos_temporal, "imagenes/".$imagenProyectos);

        $objConexion = new conexion();
        $sql="INSERT INTO `imagenproyectos` (`id`, `imagen`) VALUES  (NULL,'$imagenProyectos')";
        $objConexion->ejecutar($sql);
        header('location:adm_foto_proyectos.php');
    }
    if($_GET){

        $id=$_GET['borrar'];
        $objConexion= new conexion();
    
        $imagenproyectosconsulta = $objConexion->consultar("SELECT imagen FROM `imagenproyectos` WHERE id=".$id);
    
        unlink("imagenes/".$imagenproyectosconsulta[0]['imagen']);
    
    
        $sql="DELETE FROM `imagenproyectos` WHERE `imagenproyectos`.`id` =".$id;
        $objConexion->ejecutar($sql);
    
        header("location:adm_foto_proyectos.php");
    
    } 

$objConexion = new conexion();
$fotosProyectos=$objConexion->consultar("SELECT * FROM `imagenproyectos`");
?>
<?php include("cabecera.php")?>

<div class="container">
    <a href="adm_index.php " class="btn btn-success">volver</a>
    <br>
    <br>
    <div class="row">
        <div class="col-6">
            <div class="card proyectos-edit-container">

                <div class="card-header">
                        PROYECTOS -> FOTOS
                </div>
                <div class="card-body">
                    <form action="adm_foto_proyectos.php" method="post" enctype="multipart/form-data">
                    imagen: <input required class="form-control" type="file" name="ImagenProyectos" id="">
                    <br>
                    <input class="btn btn-success" type="submit" value="guardar" name="submit1">
                    </form>
                </div>

            </div>
        </div>



        <div class="tabla-comisiones-foto col-6">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($fotosProyectos as $fotoProyecto) {?>
                <tr>
                <th><?php echo $fotoProyecto['id']?></th>
                <td><img src="imagenes/<?php echo $fotoProyecto['imagen']?>" alt="" width="100px"></td>
                <td><a class="btn btn-danger" href="?borrar=<?php echo $fotoProyecto['id']; ?>">eliminar</a></td>
                </tr>
                <?php } ?>

            </tbody>
            </table>
        </div>
        <div class="tabla-comisiones-precios col-6">
        </div>
</div>