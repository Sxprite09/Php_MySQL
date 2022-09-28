<?php include 'layouts/header.php'; ?>
<?php
    if(!isset($_GET['codigo'])){
        header('location: index.php?mensaje=error');
        exit();
    }
    include_once 'validar_usuario.php';
    $codigo = $_GET['codigo'];
    $sentencia = $bd->prepare("SELECT * FROM usuarios WHERE codigo = ?;");
    $sentencia->execute([$codigo]);
    $usuarios = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($usuarios);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
             <div class="card">
                <div class="card-header">
                    Editar Datos:
                </div>
                <form class="p-4" method="POST" action="controlador_modificar_usuario.php">
                    <div class="mb-1">
                        <labe class="form-label">IDENTIFICACION: </labe>
                        <input type="number" class="form-control" name="txtIdentificacion" required value="<?php echo $usuarios->identificacion;?>">
                    </div>
                    <div class="mb-1">
                        <labe class="form-label">NOMBRE: </labe>
                        <input type="text" class="form-control" name="txtNombre" required value="<?php echo $usuarios->nombre;?>">
                    </div>
                    <div class="mb-1">
                        <labe class="form-label">USUARIO: </labe>
                        <input type="text" class="form-control" name="txtUsuario" required value="<?php echo $usuarios->usuario;?>">
                    </div>
                    <div class="mb-1">
                        <labe class="form-label">CLAVE: </labe>
                        <input type="password" class="form-control" name="txtClave" required value="<?php echo $usuarios->clave;?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $usuarios->codigo;?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'layouts/footer.php'; ?>