<?php include('sesion.php')?>
<?php include("conexion.php");?>
<?php
    if($_POST){
        //foto comisiones
        $descripcionImagenComisiones = $_POST['descripcion-imagen-comisiones'];

        $fecha= new DateTime();
        $imagenComisiones=$fecha->getTimestamp()."_".$_FILES['ImagenComisiones']['name'];
        $imagenComisiones_temporal=$_FILES['ImagenComisiones']['tmp_name'];
        move_uploaded_file($imagenComisiones_temporal, "imagenes/".$imagenComisiones);

        $objConexion = new conexion();
        $sql="INSERT INTO `imagencomisiones` (`id`, `descripcion`, `imagen`) VALUES  (NULL,'$descripcionImagenComisiones','$imagenComisiones')";
        $objConexion->ejecutar($sql);
        header('location:adm_foto_comisiones.php');
    }
    if($_GET){

        $id=$_GET['borrar'];
        $objConexion= new conexion();
    
        $imagencomisionesconsulta = $objConexion->consultar("SELECT imagen FROM `imagencomisiones` WHERE id=".$id);
    
        unlink("imagenes/".$imagencomisionesconsulta[0]['imagen']);
    
    
        $sql="DELETE FROM `imagencomisiones` WHERE `imagencomisiones`.`id` =".$id;
        $objConexion->ejecutar($sql);
    
        header("location:adm_foto_comisiones.php");
    
    }

$objConexion = new conexion();
$fotosComisiones=$objConexion->consultar("SELECT * FROM `imagencomisiones`");
?>
<?php include("cabecera.php")?>

<div class="container">
    <a href="adm_index.php " class="btn btn-success">volver</a>
    <a href="adm_tabla_comisiones.php " class="btn btn-success">configurar tabla de precios</a>
    <br>
    <br>
    <div class="row">
        <div class="col-6">
            <div class="card comisiones-edit-container">

                <div class="card-header">
                        COMISIONES-> FOTOS
                </div>
                <div class="card-body">
                    <form action="adm_foto_comisiones.php" method="post" enctype="multipart/form-data">

                    descripcion de la imagen: <input Required class="form-control" type="text" name="descripcion-imagen-comisiones" id="">
                    <br>
                    imagen: <input required class="form-control" type="file" name="ImagenComisiones" id="">
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
                <th scope="col">descripcion</th>
                <th scope="col">imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($fotosComisiones as $fotoComisiones) {?>
                <tr>
                <th><?php echo $fotoComisiones['id']?></th>
                <td><?php echo $fotoComisiones['descripcion']?></td>
                <td><img src="imagenes/<?php echo $fotoComisiones['imagen']?>" alt="" width="100px"></td>
                <td><a class="btn btn-danger" href="?borrar=<?php echo $fotoComisiones['id']; ?>">eliminar</a></td>
                </tr>
                <?php } ?>

            </tbody>
            </table>
        </div>
</div>
