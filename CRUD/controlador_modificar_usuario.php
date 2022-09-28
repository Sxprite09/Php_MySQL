<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('location: index.php?mensaje=error');
    }
    include 'validar_usuario.php';
    $codigo = $_POST['codigo'];
    $identificacion = $_POST['txtIdentificacion'];
    $nombre = $_POST['txtNombre'];
    $usuario = $_POST['txtUsuario'];
    $clave = $_POST['txtClave'];

    $sentencia = $bd->prepare("UPDATE usuarios SET identificacion = ?, nombre = ?, usuario = ?, clave = ? where codigo = ?;");
    $resultado = $sentencia->execute([$identificacion, $nombre, $usuario, $clave, $codigo]);

    if($resultado === TRUE){
        header('location: index.php?mensaje=editado');
    }else{
        header('location: index.php?mensaje=error');
        exit();
    }
?>
