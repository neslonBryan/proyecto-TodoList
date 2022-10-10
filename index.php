<?php
    $alert='';

    session_start();
    if(!empty($_SESSION['active'])){
        header('location:');
    }
    else{
    if(!empty($_POST)){
        if(empty($_POST['usuario'])||empty($_POST['clave'])){
            $alert='Ingrese su usuario y clave';
        }
        else{
            require_once "conexion.php";
            $user = $_POST['usuario'];
            $pass = $_POST['clave'];
            
            $query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario ='$user' AND clave ='$pass'");
            $result = mysqli_num_rows($query);
            
            if($result > 0){
                $data = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['idUser'] = $data['idusuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['user'] = $data['usuario'];
                $_SESSION['rol'] = $data['rol'];

                header('location:sistema/');
            }
            else{
                $alert='El usuario o clave son incorrectos';
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
        <input type="text" name="usuario" placeholder="Ingrese el correo" require>
        <input type="password" name="clave" placeholder="Ingrese la contraseña" require>
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