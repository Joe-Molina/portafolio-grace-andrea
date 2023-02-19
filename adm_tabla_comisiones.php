<?php include('sesion.php')?>
<?php include("conexion.php");?>
<?php
if($_POST){
    //tabla precios
    $tipoComisiones = $_POST['tipoDeDibujo'];
    $miEstiloPrecio = $_POST['MiEstilo'];
    $LineartPrecio = $_POST['lineart'];
    $CartoonPrecio = $_POST['Cartoon'];
    $chibisPrecio = $_POST['chibis'];
    $sketchsPrecio = $_POST['sketchs'];

    $objConexion = new conexion();
    $sql="INSERT INTO `tablacomisiones` (`id`, `parte del cuerpo`, `mi estilo`, `con line art`, `cartoon`, `chibi`, `sketchs`) VALUES (NULL, '$tipoComisiones', '$miEstiloPrecio', '$LineartPrecio', '$CartoonPrecio', '$chibisPrecio', '$sketchsPrecio')";
    $objConexion->ejecutar($sql);
    header('location:adm_tabla_comisiones.php');
}

if($_GET){

    $id=$_GET['borrar'];
    $objConexion= new conexion();

    $imagencomisionesconsulta = $objConexion->consultar("SELECT imagen FROM `imagencomisiones` WHERE id=".$id);


    $sql="DELETE FROM `tablacomisiones` WHERE `tablacomisiones`.`id` =".$id;
    $objConexion->ejecutar($sql);

    header("location:adm_tabla_comisiones.php");

}

$objConexion = new conexion();
$tablaComisiones=$objConexion->consultar("SELECT * FROM `tablacomisiones`");
?>
<?php include("cabecera.php") ?>



<div class="container">
<a href="adm_index.php " class="btn btn-success">volver</a>
<a href="adm_foto_comisiones.php " class="btn btn-success">configurar fotos de la tabla</a>
<br><br>
    <div class="row">
        <div class="col-6">
                <div class="card comisiones-edit-container">
                <div class="card-header">
                        COMISIONES-> PRECIOS
                </div>

                <div class="card-body">
                    <form action="adm_tabla_comisiones.php" method="post">
                    TIPO:
                    <select name="tipoDeDibujo" id="" class="form-select form-select-sm" >
                    <option value="Cara">solo cara</option>
                    <option value="Medio cuerpo">medio cuerpo</option>
                    <option value="Cuerpo completo">cuerpo completo</option>
                    </select>
                    Mi estilo: <input Required class="form-control" type="text" name="MiEstilo" id="">
                    con lineart: <input Required class="form-control" type="text" name="lineart" id="">
                    Cartoon	: <input Required class="form-control" type="text" name="Cartoon" id="">
                    chibis: <input Required class="form-control" type="text" name="chibis" id="">
                    sketchs: <input Required class="form-control" type="text" name="sketchs" id="">

                    <input class="btn btn-success" type="submit" value="guardar" name="submit1">
                    </form>
                </div>
                </div>
        </div>  
            <div class="col-6">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">parte del cuerpo</th>
                    <th scope="col">mi estilo</th>
                    <th scope="col">con line art</th>
                    <th scope="col">chibis</th>
                    <th scope="col">cartoon</th>
                    <th scope="col">sketchs</th>
                    <th scope="col">opciones</th>
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
                    <td><a class="btn btn-danger" href="?borrar=<?php echo $tablafilasComisiones['id']; ?>">eliminar</a></td>
                    </tr>
                    <?php } ?>

                </tbody>
                </table>
            </div>
        
        </div>
    </div>
</div>