
<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo "<br><a href='login.html'>Login</a>";
   echo "<br><br><a href='index.html'>Registrarme</a>";
   header('Location: http://localhost/cdcn/login.html');//redirige a la página de login si el usuario quiere ingresar sin iniciar sesion


exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();
header('Location: http://localhost/cdcn/login.html');//redirige a la página de login, modifica la url a tu conveniencia
echo "Tu sesion a expirado,
<a href='login.html'>Inicia Sesion</a>";
exit;
}

?>
<?php 
include('conecta.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="estilos.css">
        <script src="js/datos_alumno_der.js"></script>
        <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

        <script src="js/valida_rut.js"></script>
        <title>Ingreso Ficha Derivación kinesiología</title>
</head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div>
        <p></p>
        <a class="btn btn-primary" href="kinesiologia.php" role="button">Ir Atrás</a>     
        <p></p>  
        <center>
        <table id="tablamenu" class="table table-hover" style="width:700px; height:50px">
      
        </table>
            <form id="form_ficha_der" name="form_ficha_der"  action="g_ficha_der_kine.php" method="post">
                <h4>Ficha Derivación</h4>
                    <table  id="tablamenu" class="table table-hover" style="width:700px; height:200px" >
                        <thead>
                        </thead>
                        <tbody>
                            <tr class="table-info">
                                <td><span>De</span></td>
                                <td> 
                                    <div class="row">
                                        <div class="col">
                                        <select id="token_taller" name="de[]" size="0" > 
                                        <option value=""></option>
   
                                        <option name="de[]" value="CESFAM">CESFAM</option>
                                        <option name="de[]" value="colegio">Colegio</option>    
<?php
    $query = $conexion -> query ('SELECT * FROM talleres');
    while ($valores = mysqli_fetch_array($query)) {
      echo '<option id="token_taller"  name="de[]" value="'.$valores['nom_taller'].'">'.$valores['nom_taller'].'</option>';
    }
      $query = $conexion -> query ('SELECT * FROM salas');
      while ($valores2 = mysqli_fetch_array($query)) {
        echo '<option id="token_taller"  name="de[]" value="'.$valores2['nom_sala'].'">'.$valores2['nom_sala'].'</option>';
  
    }
  ?>

</select>                                           

                                            </div>
                                        </div>
                                </td>
                                <td><span>Para.</span></td>
                                <td>                                                             
                                    <div class="row">
                                        <div class="col">
                                        <select name=" para[]" id="">
                        <option value=""></option>
                        <?php
    $query = $conexion -> query ('SELECT * FROM talleres');
    while ($valores = mysqli_fetch_array($query)) {
      echo '<option id="token_taller"  name="para[]" value="'.$valores['nom_taller'].'">'.$valores['nom_taller'].'</option>';
    }
      $query = $conexion -> query ('SELECT * FROM salas');
      while ($valores2 = mysqli_fetch_array($query)) {
        echo '<option id="token_taller"  name="para[]" value="'.$valores2['nom_sala'].'">'.$valores2['nom_sala'].'</option>';
  
    }
  ?>

                    </select>                                       
                
                                        </div>
                                    </div>
                                </td>
                            
                            </tr>
                            <tr class="table-info">
                                <td><span>Fecha de derivacion.</span></td>
                                <td> 
                                    <div class="row">
                                        <div class="col">
                                            <input type="date" name="fecha_derivacion" class="form-control" placeholder="aaaa/mm/dd">
                                        </div>
                                    </div>
                                </td>
                                <td><span>Nombre Tratamiento</span></td>
                                <td>                                                             
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="nom_t" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                        
                     <p><h6>1. ANTECEDENTES PERSONALES</h6></p>
                        <table  id="tablamenu" class="table table-hover" style="width:700px; height:200px" >
                            <tbody>
                            <tr class="table-info">
                                <td><span>R.U.N</span></td>
                                <td> 
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" id="run_al" name="run_al" class="form-control"maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                                        </div>
                                    </div>
                                </td>
                                <td><span>Nombre completo.</span></td>
                                <td>                                                             
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" id="token_alumno3" name="nombre_al" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-info">
                                    <td><span>Fecha nacimiento.</span></td>
                                    <td> 
                                        <div class="row">
                                            <div class="col">
                                                <input type="text"id="token_alumno5" name="f_al" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </td>
                                    <td><span>Edad.</span></td>
                                        <td>                                                             
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" id="token_alumno4" name="e_al" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>          
                                    <tr class="table-info">
                                        <td><span>Establecimiento.</span></td>
                                        <td> 
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" name="est_al" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td><span>Curso</span></td>
                                        <td>                                                             
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" name="curso" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-info">
                                        <td><span>Direccion.</span></td>
                                        <td> 
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" id="token_alumno7" name="dir_al" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td><span>Fono.</span></td>
                                        <td>                                                             
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" id="token_alumno6"  name="fono_al" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                    </table>
                <p><h6>2. ANTECEDENTES DEL ADULTO RESPONSABLE</h6></p>
                <table  id="tablamenu" class="table table-hover" style="width:700px; height:200px" >
                    <tbody>
                        <tr class="table-info">
                            <td><span>R.U.N</span></td>
                            <td> 
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="run_ap" class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                                    </div>
                                </div>
                            </td>
                            <td><span>Nombre completo.</span></td>
                            <td>                                                             
                                <div class="row">
                                    <div class="col">
                                        <input type="text"  name="nom_ap" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="table-info">
                            <td><span>Fecha nacimiento.</span></td>
                            <td> 
                                <div class="row">
                                    <div class="col">
                                        <input type="date"  name="f_ap" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                            <td><span>Edad.</span></td>
                            <td>                                                             
                                <div class="row">
                                    <div class="col">
                                        <input type="text"  name="e_ap" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                        </tr>          
                        <tr class="table-info">
                            <td><span>Domicilio.</span></td>
                            <td> 
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="direc_ap" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                            <td><span>Parentesco</span></td>
                            <td>                                                             
                                <div class="row">
                                    <div class="col">
                                        <input type="text"  name="par_ap" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p><h6>3. DESCRIPCION PROBLEMATICA DEL NIÑO</h6></p>
                <table  id="tablamenu" class="table table-hover" style="width:700px; height:100px" >
                    <tbody>
                        <tr class="table-info">
                            <td> 
                                <textarea name="problematica_niño" id="" cols="90" rows="5"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table  id="tablamenu" class="table table-hover" style="width:700px; height:10px" >
                        <tr class="table-info">
                            <td><span><b>Documentacion Adjunta</b></span></td>
                            <td><span>Inf.Social</span></td>
                            <td>  
                                <input type="checkbox" name="doc[]" value="inf.Social" id="">                                                           
                            </td>
                            <td><span>Inf.Pedagógico</span></td>
                            <td>  
                                <input type="checkbox" name="doc[]" value="inf. Pedagogico" id="">                                                           
                            </td>
                            <td><span>Inf.clínico</span></td>
                            <td>  
                                <input type="checkbox" name="doc[]" value="inf.clinico" id="">                                                           
                            </td>
                            <td><span>Otros</span></td>
                            <td>  
                                <input type="checkbox" name="doc[]" value="otros" id="">                                                           
                            </td>
                        </tr>
                </table>
                <table  id="tablamenu" class="table table-hover" style="width:700px; height:10px" >
                        <tr class="table-info">
                            <td colspan="2"><span><b>4. Nombre institución derivadora</b></span></td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="nom_inst_der" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                            
                        <tr class="table-info">
                            <td><span>Responsable</span></td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="responsable" class="form-control" placeholder="">
                                    </div>
                                </div> 
                            </td>
                            <td><span>Cargo</span></td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="cargo" class="form-control" placeholder="">
                                    </div>
                                </div> 
                            </td>
                        </tr>
                </table>
            </form>
            &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp
            &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp
            &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp
            &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp
            &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp
            &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  
            <button type="submit" form="form_ficha_der" class="btn btn-success">Envio</button>

        </center>
</body>
</html>