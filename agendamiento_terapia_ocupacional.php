
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
include "conecta.php";
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
    
    <script src="js/cargar_terapia.js"></script>
    <script src="js/valida_rut.js"></script>


    <title>Agendamiento Terapia Ocupacional</title>
</head>
<body style="margin: 25px 50px 75px">
    
    
  
                <img src="images/logocor.png" width="100px" height="100px"/>
                <div style="float:right" >
                <h6>Bienvenido <?php echo  $_SESSION['username'];?></h6>
                <a href=logout.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
                <p></p>
                </div> 
                <p></p>
                <a class="btn btn-primary" href="menu_terapia.php" role="button">Ir Atrás</a>     
                 
                <p></p>  
<center>
        
    <h3>Entrevista de Terapia Ocupacional</h3>
    <br>
    
    <form name="formulario_terapia" action="guardar_terapia.php" method="post" target="_self" ONSUBMIT="return pregunta();">

<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
<thead>
<tr class="table-info">   
<th><h6>* <u><strong>Antecedentes personales:</strong></u></h6></th>
<th> <input type="hidden" class="form-control" placeholder=""></th>
<th> <input type="hidden" class="form-control" placeholder=""></th>
<th> <input type="hidden" class="form-control" placeholder=""></th>
</tr>

</thead>
<tbody>
    <tr class="table-info">
    <td><span>Run.</span></td>
        <td> 
                    <div class="row">
                        <div class="col">
                            <input type="text" id="run" name="run" class="form-control" placeholder="11111111-1" required oninput="checkRut(this)">
                        </div>
                    </div>
        </td>
        <td><span>Nombre.</span></td>
        <td> 
                    <div class="row">
                        <div class="col">
                            <input type="text" id="token_alumno2" name="nombre" class="form-control" placeholder="">
                        </div>
                    </div>
        </td>
        

    </tr>
    <tr class="table-info">
    <td><span>Fecha de nacimiento.</span></td>
        <td>                                                             
            <div class="row">
                <div class="col">
                    <input type="date" id="token_alumno5"  name="fecha_nacimiento" class="form-control" placeholder="">
                </div>
            </div>
        </td>
            <td><span>Edad.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text" id="token_alumno3" name="edad" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            
    </tr>

    <tr class="table-info">
    <td><span>Fecha de ingreso.</span></td>
    <td>
            <!-- Campo de entrada de fecha -->
            
            <input type="date" id="fecha_ingreso" name="fecha_ingreso" min="2019-01-01"
                                            max="2030-01-01" step="1">
           
          </td>
            <td><span>Parentesco.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text" id="parentesco" name="parentesco" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
           
    </tr>
    <tr class="table-info">
    <td><span>Teléfono de contacto.</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text" id="token_alumno4" name="telefono" class="form-control" placeholder="">
                    </div>
                </div>
            </td>
            <td><span>Diagnóstico.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text"  id="diagnostico" name="diagnostico" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
           
    </tr>
    <tr class="table-info">
    <td><span>Motivo de derivación</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text"  id="motivo"  name="motivo" class="form-control" placeholder="">
                    </div>
                </div>
            </td>
        <td><span>Sala.</span></td>
        <td>                                                             
        <select id="nombre_sala" name="sala[]" size="0" >
<?php
$query = $conexion -> query ("SELECT*FROM salas");
while ($valores = mysqli_fetch_array($query)) {
echo '<option id="nombre_sala"  name="sala[]" value="'.$valores['id_sala'].'">'.$valores['nom_sala'].'</option>';
}
?>
</select>    
        </td>
        
       
       
    </tr>
</table>
<br>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
        <h3>* Anamnesis</h3></p>
   <td class="table-info">
     <u><strong>Antecedentes pre-natales:</strong></u> (edad de madre al embarazo, embarazos anteriores, 
                                       uso de medicamentos o dificultades durante este).
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea name="a_prenatales" id="a_prenatales" cols="137" rows="2"></textarea>
                         </td>
                </tr>
        </tbody>
</table> 
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
   <td class="table-info">
     <u><strong>Antecedentes peri-natales:</strong></u> (tipo de parto, prematuridad, peso, talla, alimentación,sueño/vigilia).
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea name="a_perinatales" id="a_perinatales" cols="137" rows="2"></textarea>
                         </td>
                </tr>
        </tbody>
</table>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
   <td class="table-info">
     <u><strong>Antecedentes clinicos:</strong></u> (enfermedades crónicas, hospitalizaciones, uso de fármacos, alergias).
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea name="a_clinicos" id="a_clinicos" cols="137" rows="2"></textarea>
                         </td>
                </tr>
        </tbody>
</table>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
<thead>
<tr class="table-info">   
<th><h6><u><strong>Hitos del desarrollo psicomotor:</strong></u></h6></th>
<th> <input type="hidden" class="form-control" placeholder=""></th>
<th> <input type="hidden" class="form-control" placeholder=""></th>
<th> <input type="hidden" class="form-control" placeholder=""></th>
</tr>

</thead>
<tbody>
    <tr class="table-info">
        <td><span>Control de cabeza:.</span></td>
        <td> 
                    <div class="row">
                        <div class="col">
                            <input type="text"  id="control_cabeza" name="control_cabeza" class="form-control" placeholder="">
                        </div>
                    </div>
        </td>
        <td><span>Primeras palabras.</span></td>
        <td>                                                             
            <div class="row">
                <div class="col">
                    <input type="text"  id="primeras_palabras" name="primeras_palabras" class="form-control" placeholder="">
                </div>
            </div>
        </td>

    </tr>
    <tr class="table-info">
            <td><span>Gateo.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text"  id="gateo"  name="gateo" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Primeras frases.</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text" id="primeras_frases" name="primeras_frases"  class="form-control" placeholder="">
                    </div>
                </div>
            </td>
    </tr>

    <tr class="table-info">
            <td><span>Marcha independiente.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text"  id="marcha_indepediente"  name="marcha_indepediente" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Control de esfinter(vesical y anal).</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text"  id="control_esfinter"  name="control_esfinter" class="form-control" placeholder="">
                    </div>
                </div>
            </td>
    </tr>                                            

    <table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
<thead>
<tr class="table-info">   
<th><h6>* <u><strong>Antecedentes escolares:</strong></u></h6></th>
<th> <input type="hidden" class="form-control" placeholder=""></th>
<th> <input type="hidden" class="form-control" placeholder=""></th>
<th> <input type="hidden" class="form-control" placeholder=""></th>
</tr>

</thead>
<tbody>
    <tr class="table-info">
        <td><span>Edad de ingreso a sistema escolar.</span></td>
        <td> 
                    <div class="row">
                        <div class="col">
                            <input type="text"  id="edad_ingreso_sistema_escolar"  name="edad_ingreso_sistema_escolar"class="form-control" placeholder="">
                        </div>
                    </div>
        </td>
        <td><span>Asistió a jardin.</span></td>
        <td>                                                             
            <div class="row">
                <div class="col">
                    <input type="text"  id="asistio_jardin" name="asistio_jardin" class="form-control" placeholder="">
                </div>
            </div>
        </td>

    </tr>
    <tr class="table-info">
            <td><span>Nombre colegio actual.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text"  id="nombre_colegio_actual" name="nombre_colegio_actual" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Curso.</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text"  id="curso" name="curso" class="form-control" placeholder="">
                    </div>
                </div>
            </td>
    </tr>

    <tr class="table-info">
            <td><span>N° de establecimiento educacionales.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text"  id="n_establecimiento_educacionales" name="n_establecimiento_educacionales" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Motivo de los cambios.</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text"  id="motivo_cambios" name="motivo_cambios" class="form-control" placeholder="">
                    </div>
                </div>
            </td>
    </tr>                                         
</tbody>
</table>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
   <td class="table-info">
     <u><strong>Observaciones:</strong></u>
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea name="observaciones" id="observaciones" cols="137" rows="2"></textarea>
                         </td>
                </tr>
        </tbody>
</table>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
   <td class="table-info">
     <u><strong>Genograma familiar</strong></u> (Nombre,edad,escolaridad,ocupación,parentesco).
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea name="genograma" id="genograma" cols="137" rows="7"></textarea>
                         </td>
                </tr>
        </tbody>
</table>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
   <td class="table-info">
     *<u><strong>Red de apoyo:</strong></u>
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea name="red_apoyo" id="red_apoyo" cols="137" rows="2"></textarea>
                         </td>
                </tr>
        </tbody>
</table>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
   <td class="table-info">
     *<u><strong>Otros antecedentes revelantes:</strong></u> (historia familiar, antecedentes de salud, 
                dinámicas familiar, antecedentes de la vivienda).
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea name="otros_antecedentes_revelantes" id="otros_antecedentes_revelantes" cols="137" rows="5"></textarea>
                         </td>
                </tr>
        </tbody>
</table>
<br>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
        <h3>Sintesis evaluación de Terapia Ocupacional</h3></p>
   <td class="table-info">
     *<u><strong>Impresión general:</strong></u> (ingreso del usuario, ayudas técnicas, exploración 
                espontanea, tipo de juego, higiene, intereses, contacto visual,respuesta al Nombre, 
                conducta social, entre otras).
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea name="impresion_general" id="impresion_general" cols="137" rows="5"></textarea>
                         </td>
                </tr>
        </tbody>
</table>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
<h3>* Áreas de ocupación</h3>
   <td class="table-info">
     <u><strong>AVDB:</strong></u> (alimentación, vestuario, higebe menor y mayor, 
                                            cuidado de intestino, movilidad funcional, entre otros).
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea name="avdb" id="avdb" cols="137" rows="7"></textarea>
                         </td>
                </tr>
        </tbody>
</table>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
   <td class="table-info">
     <u><strong>AVDI:</strong></u> (cuidado de mascotas, manejo de hogar, limpieza, entre otros).
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea name="avdi" id="avdi" cols="137" rows="4"></textarea>
                         </td>
                </tr>
        </tbody>
</table>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
   <td class="table-info">
     <u><strong>Participación social:</strong></u>
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea name="participacion_social" id="participacion_social" cols="137" rows="4"></textarea>
                         </td>
                </tr>
        </tbody>
</table>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
   <td class="table-info">
     <u><strong>Juego:</strong></u> (tipo de juego, con pares, con juguetes).
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea name="juego" id="juego" cols="137" rows="4"></textarea>
                         </td>
                </tr>
        </tbody>
</table>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
   <td class="table-info">
     <u><strong>Descanso y sueño:</strong></u>
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea name="descanso_sueño" id="descanso_sueño" cols="137" rows="4"></textarea>
                         </td>
                </tr>
        </tbody>
</table>


<h3>Poblemática actual del niño/a:</h3>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
<thead>
<tr class="table-info">   
<th><h6>* <u><strong>Dificultades en:</strong></u></h6></th>
<th> <input type="hidden" class="form-control" placeholder=""></th>
</tr>

</thead>
<tbody>
    <tr class="table-info">
        <td style="width: 300px"><span>Comunicación con sus pares y/o adultos / en pronunciar palabras.</span></td>
        <td> 
                    <div class="row">
                        <div class="col">
                            <input type="text"  id="comunicacion_pares" name="comunicacion_pares" class="form-control" placeholder="">
                        </div>
                    </div>
        </td>
    </tr>
    <tr class="table-info">
            <td><span>Adaptarse a situaciones nuevas o cambios.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text"  id="adaptarse_situaciones" name="adaptarse_situaciones" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
    </tr>

    <tr class="table-info">
            <td><span>Regulación emocional.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text" id="regulacion_emocional"  name="regulacion_emocional" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
    </tr>
    <tr class="table-info">
            <td><span>Cumplir con rutinas en el hogar.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text"  id="cumplir_rutinas" name="cumplir_rutinas" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
    </tr>
    <tr class="table-info">
        <td><span>Aceptar y/ cumplir normas, reglas de padres y/o profesores.</span></td>
        <td> 
            <div class="row">
                <div class="col">
                     <input type="text"  id="aceptar_cumplir" name="aceptar_cumplir" class="form-control" placeholder="">
                </div>
            </div>
        </td>
    </tr>
    <tr class="table-info">
        <td><span>Participar en actividades pedagógicas/escolares.</span></td>
        <td> 
            <div class="row">
                <div class="col">
                     <input type="text" id="participar_actividades" name="participar_actividades"  class="form-control" placeholder="">
                </div>
            </div>
        </td>
    </tr>
    <tr class="table-info">
        <td><span>Dificultades sensoriales.</span></td>
        <td> 
            <div class="row">
                <div class="col">
                     <input type="text"  id="dificultades" name="dificultades" class="form-control" placeholder="">
                </div>
            </div>
        </td>
    </tr>
    <tr class="table-info">
        <td><span>Otros.</span></td>
        <td> 
            <div class="row">
                <div class="col">
                     <input type="text"  id="otros1" name="otros1" class="form-control" placeholder="">
                </div>
            </div>
        </td>
    </tr>
    <tr class="table-info">
        <td><span>Otros.</span></td>
        <td> 
            <div class="row">
                <div class="col">
                     <input type="text" id="otros2" name="otros2" class="form-control" placeholder="">
                </div>
            </div>
        </td>
    </tr>
</table>

<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
   <td class="table-info">
     *<u><strong>Expectativas y prioridades de los padres:</strong></u>
    </td>
        <tbody>
                <tr class="table-info" >
                        <td > 
                        <textarea  id="expectativas" name="expectativas" cols="137" rows="5"></textarea>
                         </td>
                </tr>
        </tbody>
</table>
</form>
</center>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp


<script type="text/javascript">
                //*******************ALERT DE ENVIO*******************/
                        function pregunta(e){ 
                        if (confirm('Estas seguro de enviar los datos de este formulario?'))
                                {       
                                        document.formulario_terapia.submit();                             

                        }else   {
                                        e.preventDefault();
                                }
       
                        };

                        
    </script>
</table>
<button type="button" class="btn btn-success" style="width: 200px" onclick="pregunta();">Enviar</button>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>