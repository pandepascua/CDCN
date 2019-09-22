
<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo "<br><a href='a05dfcb.html'>Login</a>";
   echo "<br><br><a href='index.html'>Registrarme</a>";
   header('Location: http://localhost/cdcn/a05dfcb.html');//redirige a la página de login si el usuario quiere ingresar sin iniciar sesion


exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();
header('Location: http://localhost/cdcn/a05dfcb.html');//redirige a la página de login, modifica la url a tu conveniencia
echo "Tu sesion a expirado,
<a href='a05dfcb.html'>Inicia Sesion</a>";
exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos.css">
    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

    <title>Menu talleres.</title>
</head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout_admin.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div>
       
  <p></p>
<center>
        <h3>Administración de Talleres.</h3>
        <table  id="tablamenu" class="table table-hover" style="width:700px; height:200px" >
                <thead>
                    <tr class="table-info">
                        <th scope="col">Menu</th>
                        <th scope="col">Acción</th>
        
                    </tr>
                </thead>
                <tbody>
                <tr class="table-info">
                            <td><span>Lista talleres.</span></td>
                            <td> <ul class="nav nav-pills nav-fill"><li class="nav-item"><a class="nav-link active" href="lista_talleres.php">Continuar</a></li></ul></td>
                    </tr>
                    <tr class="table-info">
                        <td><span>Insertar taller.</span></td>
                        <td> <ul class="nav nav-pills nav-fill"><li class="nav-item"><a class="nav-link active" href="inscripcionalumno.php">Continuar</a></li></ul></td>
        
                    </tr>
                    <tr class="table-info">
                        <td><span>Modificar taller.</span></td>
                        <td> <ul class="nav nav-pills nav-fill"><li class="nav-item"><a class="nav-link active" href="asistencia_alumnos.php">Continuar</a></li></ul></td>
                    </tr>
                    <tr class="table-info">
                        <td><span>Eliminar taller.</span></td>
                        <td> <ul class="nav nav-pills nav-fill"><li class="nav-item"><a class="nav-link active" href="modificacion_eliminacion_alumnos.php">Continuar</a></li></ul></td>
                    </tr>    
                </tbody>
        </table>
    </center>
</body>
</html>