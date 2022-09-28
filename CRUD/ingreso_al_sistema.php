<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <!--Estilos css-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method="post" class="form">
        <h2 class="form__title">Ingreso Al Sistema</h2>
    <div class="form__container">
        <div class="form__group">
            <input type="text" name="usuario" class="form__input" placeholder=" " required="">
            <label for="user" class="form__label">Usuario</label>
            <span class="form__line"></span>
        </div>
        <div class="form__group">
            <input type="password" name="clave" class="form__input" placeholder=" " required="">
            <label for="password" class="form__label">Contraseña</label>
            <span class="form__line"></span>
            <br>
            <br>
            <br>
            <input type="submit" class="form__submit" value="Ingresar">
        </div>
    </div>
    </form>
</body>
</html>