
<?php
session_start();
?>

<?php

include 'conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$username = $_POST['username'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

$password = $_POST['password'];

 $sql = "SELECT nombre,apellido,nombre_usuario,password FROM $tbl_name WHERE   nombre = '$nombre' and  apellido = '$apellido' and nombre_usuario = '$username' and id_perfil=1";
 $sql2 = "SELECT nombre_usuario,password FROM $tbl_name WHERE nombre_usuario = '$username' and id_perfil=2";
 $sql3 = "SELECT nombre_usuario,password FROM $tbl_name WHERE nombre_usuario = '$username' and id_perfil=3";
 $sql4 = "SELECT nombre_usuario,password FROM $tbl_name WHERE nombre_usuario = '$username' and id_perfil=4";
 $sql5 = "SELECT nombre_usuario,password FROM $tbl_name WHERE nombre_usuario = '$username' and id_perfil=5";
 $sql6 = "SELECT nombre_usuario,password FROM $tbl_name WHERE nombre_usuario = '$username' and id_perfil=6";
 $sql7 = "SELECT nombre_usuario,password FROM $tbl_name WHERE nombre_usuario = '$username' and id_perfil=7";
 $sql8 = "SELECT nombre_usuario,password FROM $tbl_name WHERE nombre_usuario = '$username' and id_perfil=8";




$result= $conexion->query($sql);
$result2 = $conexion->query($sql2);
$result3 = $conexion->query($sql3);
$result4 = $conexion->query($sql4);
$result5 = $conexion->query($sql5);
$result6 = $conexion->query($sql6);
$result7 = $conexion->query($sql7);
$result8 = $conexion->query($sql8);




//if ($result->num_rows > 0) {     }
	
 
  $row = $result->fetch_array(MYSQLI_ASSOC);
  $row2 = $result2->fetch_array(MYSQLI_ASSOC);
  $row3 = $result3->fetch_array(MYSQLI_ASSOC);
  $row4 = $result4->fetch_array(MYSQLI_ASSOC);
  $row5 = $result5->fetch_array(MYSQLI_ASSOC);
  $row6 = $result6->fetch_array(MYSQLI_ASSOC);
  $row7 = $result7->fetch_array(MYSQLI_ASSOC);
  $row8 = $result8->fetch_array(MYSQLI_ASSOC);


 // if (password_verify($password, $row['password'])) { 
if ($password==$row['password']) { 

 
    $_SESSION['loggedin'] = true;
   $_SESSION['username'] = $username;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;

    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);

    echo "Bienvenido! " . $_SESSION['nombre']. $_SESSION['apellido'] ;
    
    echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
    header('Location: http://localhost/cdcn/menu.php');//redirecciona a la pagina del usuario

 } else if($password==$row2['password']){
      
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
     $_SESSION['nombre'] = $nombre;
     $_SESSION['apellido'] = $apellido;
 
     $_SESSION['start'] = time();
     $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
 
     echo "Bienvenido! " . $_SESSION['nombre']. $_SESSION['apellido'] ;
        echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
        header('Location: http://localhost/cdcn/nutricion.php');//redirecciona a la pagina del usuario


}else if($password==$row3['password']){
 
  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $username;
   $_SESSION['nombre'] = $nombre;
   $_SESSION['apellido'] = $apellido;

   $_SESSION['start'] = time();
   $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);

   echo "Bienvenido! " . $_SESSION['nombre']. $_SESSION['apellido'] ;
  echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
  header('Location: http://localhost/cdcn/psicomotricidad.php');//redirecciona a la pagina del usuario


}else if($password==$row4['password']){
   
  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $username;
   $_SESSION['nombre'] = $nombre;
   $_SESSION['apellido'] = $apellido;

   $_SESSION['start'] = time();
   $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);

   echo "Bienvenido! " . $_SESSION['nombre']. $_SESSION['apellido'] ;
  echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
  header('Location: http://localhost/cdcn/masoterapia.php');//redirecciona a la pagina del usuario


}else if($password==$row5['password']){
 
  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $username;
   $_SESSION['nombre'] = $nombre;
   $_SESSION['apellido'] = $apellido;

   $_SESSION['start'] = time();
   $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);

   echo "Bienvenido! " . $_SESSION['nombre']. $_SESSION['apellido'] ;
  echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
  header('Location: http://localhost/cdcn/kinesiologia.php');//redirecciona a la pagina del usuario


}else if($password==$row6['password']){
 
  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $username;
   $_SESSION['nombre'] = $nombre;
   $_SESSION['apellido'] = $apellido;

   $_SESSION['start'] = time();
   $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);

   echo "Bienvenido! " . $_SESSION['nombre']. $_SESSION['apellido'] ;
  echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
  header('Location: http://localhost/cdcn/acupuntura.php');//redirecciona a la pagina del usuario


}else if($password==$row7['password']){
 
  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $username;
   $_SESSION['nombre'] = $nombre;
   $_SESSION['apellido'] = $apellido;

   $_SESSION['start'] = time();
   $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);

   echo "Bienvenido! " . $_SESSION['nombre']. $_SESSION['apellido'] ;
  echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
  header('Location: http://localhost/cdcn/lista_talleres.php');//redirecciona a la pagina del usuario


}else if($password==$row8['password']){
   
  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $username;
   $_SESSION['nombre'] = $nombre;
   $_SESSION['apellido'] = $apellido;

   $_SESSION['start'] = time();
   $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);

   echo "Bienvenido! " . $_SESSION['nombre']. $_SESSION['apellido'] ;
  echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
  header('Location: http://localhost/cdcn/menu_s.php');//redirecciona a la pagina del usuario


}else{ 

  echo"<title> AVISO!! </title>";

  echo"    <link rel='shortcut icon' type='image/icon' href='images/favicon.ico'/>";
 
  echo"<body style='margin: 25px 50px 75px'>";
  echo"<img src='images/logocor.png' width='100px' height='100px'/>";
  echo "<center>";
   echo "Usuario o Contraseña estan incorrectos.";

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
   echo "</center>";
 }
 mysqli_close($conexion); 
 ?>