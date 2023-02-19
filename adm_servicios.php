<?php include('sesion.php')?>
<?php include("conexion.php");?>

<?php
    if($_POST){
        $servicios = $_POST['servicio'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];

        $fecha= new DateTime();
        $imagenServicios=$fecha->getTimestamp()."_".$_FILES['ImagenServicios']['name'];
        $imagenServicios_temporal=$_FILES['ImagenServicios']['tmp_name'];
        move_uploaded_file($imagenServicios_temporal, "imagenes/".$imagenServicios);

        $objConexion = new conexion();
        $sql="INSERT INTO `imagentablaservicios` (`id`, `servicio`, `imagen`, `cantidad`, `precio`) VALUES  (NULL, '$servicios', '$imagenServicios', '$cantidad', '$precio')";
        $objConexion->ejecutar($sql);
        header('location:adm_servicios.php');
    }
    if($_GET){

        $id=$_GET['borrar'];
        $objConexion= new conexion();
    
        $imagenConsulta = $objConexion->consultar("SELECT imagen FROM `imagentablaservicios` WHERE id=".$id);
    
        unlink("imagenes/".$imagenConsulta[0]['imagen']);
    
        $sql="DELETE FROM `imagentablaservicios` WHERE `imagentablaservicios`.`id` =".$id;
        $objConexion->ejecutar($sql);
    
        header("location:adm_servicios.php");
    
    }

$objConexion = new conexion();
$infoservicios=$objConexion->consultar("SELECT * FROM `imagentablaservicios`");
?>

<?php include("cabecera.php")?>

<div class="container">
    <a href="adm_index.php " class="btn btn-success">volver</a>
    <br>
    <br>
    <div class="row">
        <div class="col-6">
            <div class="card comisiones-edit-container">

                <div class="card-header">
                        SERVICIOS
                </div>
                <div class="card-body">
                    <form action="adm_servicios.php" method="post" enctype="multipart/form-data">

                        imagen: <input required class="form-control" type="file" name="ImagenServicios" id="">
                        <br>
                        Servicio: <input Required class="form-control" type="text" name="servicio" id="">
                        <br>
                        Cantidad: <input Required class="form-control" type="text" name="cantidad" id="">
                        <br>
                        Precio: <input Required class="form-control" type="text" name="precio" id="">
                        <br>
                        <input class="btn btn-success" type="submit" value="guardar" name="submit">
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
            <th scope="col">servicio</th>
            <th scope="col">cantidad</th>
            <th scope="col">precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($infoservicios as $infoservicio) {?>
            <tr>
            <th><?php echo $infoservicio['id']?></th>
            <td><img src="imagenes/<?php echo $infoservicio['imagen']?>" alt="" width="100px"></td>
            <td><?php echo $infoservicio['servicio']?></td>
            <td><?php echo $infoservicio['cantidad']?></td>
            <td><?php echo $infoservicio['precio']?></td>
            <td><a class="btn btn-danger" href="?borrar=<?php echo $infoservicio['id']; ?>">eliminar</a></td>
            </tr>
            <?php } ?>

        </tbody>
        </table>
        </div>