

<?php
include "conecta.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

<style type="text/css">
	body{
		color: #fff;
		background: #63738a;
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}  
</style>
    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>
<title>Registro usuario CDCN</title>
</head>
<body style="margin: 25px 50px 75px">



<div class="signup-form">
<form class="form-horizontal" action="registrar-usuario.php" method="post">
    <center>
    <div class="imgcontainer">
      <img src="images/logocor.png"  width="100px" height="100px"  alt="Avatar" class="avatar">
    </div>
    <br>
  
   
    </center>
		<h2>Registro</h2>
		<p class="hint-text">Crear cuenta para usuario.</p>
		<div class="form-group">
      <input type="text" class="form-control"  maxlength="20" placeholder="Ingrese nombre " name="nombre" required>
        </div>
		<div class="form-group">
      <input type="text" class="form-control"  maxlength="20" placeholder="Ingrese apellido" name="apellido" required>
        </div>
		<div class="form-group">
      <input type="text" class="form-control" minlength="8" maxlength="20" placeholder="Ingrese nombre de usuario" name="username" required>
        </div>
		<div class="form-group">
    <input type="password" class="form-control" minlength="8"  maxlength="30" id="pwd" placeholder="Ingresa una Contraseña" name="password" required>
        </div>
 
        <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Tipo de perfil:</label>
      <div class="col-sm-10">          
      <select id="nom_perfil" name="perfil[]" size="0" >
      <?php
        $query = $conexion -> query ("SELECT*FROM perfil");
        while ($valores = mysqli_fetch_array($query)) {
        echo '<option id="nombre_perfil"  name="perfil[]" value="'.$valores['id_perfil'].'">'.$valores['nom_perfil'].'</option>';
        }
      ?>
        </select>
      </div>
    </div>
         
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> Acepto los terminos de uso.</label>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Recordarme</label>
        </div>
      </div>
    </div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Registrarse</button>
        </div>
    </form>
	<div class="text-center">Tienes cuenta creada? <a href="login.html">Ir al Login</a></div>
</div>

</body>
</html>
