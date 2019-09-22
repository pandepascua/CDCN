
<?php
//incluimos el archivo donde se encuentran nuestros datos de conexion
 include 'conexion.php';
 
 $form_pass = $_POST['password'];
 $perfil=$_POST['perfil'];
 
 
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $tbl_name 
 WHERE nombre = '$_POST[nombre]' and apellido='$_POST[apellido]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
   echo"<title> AVISO!! </title>";
   echo"    <link rel='shortcut icon' type='image/icon' href='images/favicon.ico'/>";
   echo"<body style='margin: 25px 50px 75px'>";
  echo"<img src='images/logocor.png' width='100px' height='100px'/>";
  echo "<center>";
 echo "<br />". "<h4>Nombre de Usuario ya asignado, ingresa otro.</h4>" . "<br />";

 echo "<a href='index.php'>Por favor escoga otro Nombre</a>";
 echo "</center>";
 echo "</body>";
 }
 else{
  foreach( $perfil as $codigo=>$valor){
    $array_perfil=$valor;
 $query = "INSERT INTO usuarios (nombre,apellido,nombre_usuario, password,id_perfil) VALUES ('$_POST[nombre]','$_POST[apellido]','$_POST[username]', '$form_pass',$array_perfil)";
  }
 if ($conexion->query($query) === TRUE) {
 // header('Location: http://localhost/Login/login.html');
 echo"<title> AVISO!! </title>";

 echo"    <link rel='shortcut icon' type='image/icon' href='images/favicon.ico'/>";

 echo"<body style='margin: 25px 50px 75px'>";
 echo"<img src='images/logocor.png' width='100px' height='100px'/>";
 echo "<center>";
 echo "<br />" . "<h1>" . "Gracias por registrarse!" . "</h1>";
 echo "<h3>" . "Bienvenido: " . $_POST['nombre'] ." ".$_POST['apellido'] . "</h3>" . "\n\n";
 echo "<h3>" . "Iniciar Sesion: " . "<a href='a05dfcb.html'>Login</a>" . "</h3>"; 
echo "</center>";
echo "</body>";
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 }

 mysqli_close($conexion);
?>
