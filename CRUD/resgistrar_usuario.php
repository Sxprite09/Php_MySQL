<?php 
//print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtIdentificacion"]) || empty($_POST["txtNombre"]) || empty($_POST["txtUsuario"]) || empty($_POST["txtClave"])){
            header('location: index.php?mensaje=falta');
            exit();
    }
    include_once 'validar_usuario.php';
    $identificacion = $_POST["txtIdentificacion"];
    $nombre = $_POST["txtNombre"];
    $usuario = $_POST["txtUsuario"];
    $clave = $_POST["txtClave"];

    $sentencia = $bd->prepare("INSERT INTO usuarios(identificacion,nombre,usuario,clave) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$identificacion,$nombre,$usuario,$clave]);

    if ($resultado === TRUE){
        header('location: index.php?mensaje=registrado');
    }else{
        header('location: index.php?mensaje=error');
            exit();
    }
?>