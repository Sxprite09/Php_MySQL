<?php include 'layouts/header.php' ?>

<?php 
    include_once "validar_usuario.php";
    $sentencia = $bd-> query("SELECT * FROM usuarios");
    $usuarios = $sentencia->fetchall(PDO::FETCH_OBJ);
    //print_r($usuarios);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!--Inicio Alerta Falta-->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Error!</strong> Rellena Todos Los Campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <!--Fin Alerta Falta-->
            <!--Inicio Alerta Registrado-->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Registro Exitoso!</strong> Se Agregaron Los Datos Correctamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <!--Fin Alerta Registrado-->
            <!--Inicio Alerta Error-->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'Error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Error!</strong> Vuelve A Intentarlo.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <!-- Fin de Alerta Error-->
            <!--Inicio Alerta Editar-->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Editado!</strong>Los Datos Fueron Actualizados Correctamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <!--Fin Alerta Editar-->
            <!--Inicio Alerta Eliminar-->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Elimado!</strong>Los Datos Fueron Eliminados Correctamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <!--Fin Alerta Eliminar-->
            <div class="card">
                <div class="card-header">
                    Datos
                </div>
                <div class="p-4">
                    <div class="table-responsive align-middle">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Identificacion</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Clave</th>
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($usuarios as $dato){
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->codigo; ?></td>
                                    <td><?php echo $dato->identificacion; ?></td>
                                    <td><?php echo $dato->nombre; ?></td>
                                    <td><?php echo $dato->usuario; ?></td>
                                    <td><?php echo $dato->clave; ?></td>
                                    <td><a class="text-success" href="vista_modificacion.php?codigo=<?php echo $dato->codigo;?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a class="text-danger" href="controlador_borrar_usuario.php?codigo=<?php echo $dato->codigo;?>"><i class="bi bi-trash3-fill"></i></a></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar Datos:
                </div>
                <form class="p-4" method="POST" action="resgistrar_usuario.php">
                    <div class="mb-1">
                        <labe class="form-label">IDENTIFICACION: </labe>
                        <input type="number" class="form-control" name="txtIdentificacion" autofocus  required>
                    </div>
                    <div class="mb-1">
                        <labe class="form-label">NOMBRE: </labe>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-1">
                        <labe class="form-label">USUARIO: </labe>
                        <input type="text" class="form-control" name="txtUsuario" autofocus required>
                    </div>
                    <div class="mb-1">
                        <labe class="form-label">CLAVE: </labe>
                        <input type="password" class="form-control" name="txtClave" autofocus>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'layouts/footer.php' ?>