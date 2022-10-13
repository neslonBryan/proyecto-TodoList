<?php
    $alert='';

    session_start();
    if(!empty($_SESSION['active'])){
        header('location:principal.php');
    }
    else{
    if(!empty($_POST)){
        if(empty($_POST['email'])||empty($_POST['contraseña'])){
            $alert='Ingrese su email y clave';
        }
        else{
            require_once "conexion.php";
            $usuario = $_POST['email'];
            $contraseña = $_POST['contraseña'];
            
            $query = mysqli_query($conection,"SELECT * FROM Tusuario WHERE correoElec ='$usuario' AND contraseñaElec ='$contraseña'");
            $result = mysqli_num_rows($query);
            
            if($result > 0){
                $data = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['nombresCuenta'] = $data['nombresCuenta'];
                $_SESSION['apellidosCuenta'] = $data['ApellidosCuenta'];
                $_SESSION['email'] = $data['correoElec'];
                $_SESSION['telefono'] = $data['phone'];
                header('location:principal.php');
            }
            else{
                $alert='El email o clave son incorrectos';
                session_destroy();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iniciar sesion</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <section id="container">

        <form action="" method="post">
        <h3 id="ti">Iniciar sesion</h3>
        <img src="img/usuario.jpg" alt="login">

        <input type="text" name="email" placeholder="Ingrese el correo" require>
        <input type="password" name="contraseña" placeholder="Ingrese la contraseña" require>
        
        <div class="alert"><?php echo isset($alert) ? $alert : '';?></div>
        <input type="submit" value="Ingresar">
        </form>

    </section>
    <div class="burbujas">
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>