<?php include("conexion.php");?>

<?php 
session_start(); 

if( isset($_SESSION['usuario'])!="grace"){
    header("location:admin.php");
}

?>

<?php
if($_POST) {

    $descripcionImagenComisiones = $_POST['descripcion-imagen-comisiones'];

    $fecha= new DateTime();
    $imagenComisiones=$fecha->getTimestamp()."_".$_FILES['ImagenComisiones']['name'];
    $imagenComisiones_temporal=$_FILES['ImagenComisiones']['tmp_name'];
    move_uploaded_file($imagenComisiones_temporal, "imagenes/".$imagenComisiones);

    $objConexion = new conexion();
    $sql="INSERT INTO `imagencomisiones` (`id`, `descripcion`, `imagen`) VALUES  (NULL,'$descripcionImagenComisiones','$imagenComisiones')";
    $objConexion->ejecutar($sql);
}

if($_GET){

    $id=$_GET['borrar'];
    $objConexion= new conexion();

    $imagencomisionesconsulta = $objConexion->consultar("SELECT imagen FROM `imagencomisiones` WHERE id=".$id);

    unlink("imagenes/".$imagencomisionesconsulta[0]['imagen']);


    $sql="DELETE FROM `imagencomisiones` WHERE `imagencomisiones`.`id` =".$id;
    $objConexion->ejecutar($sql);

    header("location:administrador.php");

}

$objConexion = new conexion();
$fotosComisiones=$objConexion->consultar("SELECT * FROM `imagencomisiones`");

?>

<?php include("cabecera.php");?>

<div class="container">
    <div class="row">

        <div class="col-6">
            <div class="card comisiones-edit-container">

                <div class="card-header">
                        COMISIONES-> FOTOS
                </div>
                <div class="card-body">
                    <form action="administrador.php" method="post" enctype="multipart/form-data">

                    descripcion de la imagen: <input Required class="form-control" type="text" name="descripcion-imagen-comisiones" id="">
                    <br>
                    imagen: <input required class="form-control" type="file" name="ImagenComisiones" id="">
                    <br>
                    <input class="btn btn-success" type="submit" value="guardar">
                    </form>
                </div>

            </div>
        </div>

        <div class="col-6">
            <div class="card comisiones-edit-container">

                <div class="card-header">
                        COMISIONES-> PRECIOS
                </div>
                <div class="card-body">
                    <form action="administrador.php" method="post" enctype="multipart/form-data">
                    TIPO:
                    <select name="tipoDeDibujo" id="" class="form-select form-select-sm" >
                    <option value="Cara">solo cara</option>
                    <option value="Medio Cuerpo">medio cuerpo</option>
                    <option value="Cuerpo Completo">cuerpo completo</option>
                    </select>

                    <br>
                    Mi estilo: <input Required class="form-control" type="text" name="MiEstilo-precio" id="">
                    con lineart: <input Required class="form-control" type="text" name="con-lineart-precio" id="">
                    Cartoon	: <input Required class="form-control" type="text" name="Cartoon-precio" id="">
                    chibis: <input Required class="form-control" type="text" name="chibis-precio" id="">
                    sketchs: <input Required class="form-control" type="text" name="sketchs" id="">

                    <input class="btn btn-success" type="submit" value="guardar">
                    </form>
                </div>


            </div>
        </div>

    </div>
</div>
<div class="tabla-comisiones-container">
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
        <div class="tabla-comisiones-precios col-6">
        </div>
</div>