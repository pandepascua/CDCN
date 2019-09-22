<?php

$servidor="localhost";
$usuario="root";
$password="root";
$bd="cdcn";


try{
    $db=new PDO('mysql:host='. $servidor. '; dbname='. $bd, $usuario, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND
    => 'SET NAMES  \'utf8\''));
}
catch (PDOException $e){
    print "error!: " . $e->getMessage() . "</br>";
    die();
}

$datos_paciente=$_POST['token_datos_al_nu'];

$sql2="call datos_paciente_nutricion(?)";
$statemen= $db->prepare($sql2);
$statemen->bindParam(1,$datos_paciente, PDO::PARAM_STR,20);
if($statemen->execute()){
    //var_dump($statemen);
    $result_entrada = $statemen->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($result_entrada[0]);
    $statemen->closeCursor();

    if (isset($result_entrada[0]))
    {
        $json_entrada=json_encode($result_entrada[0]);
    }
    else
        $json_entrada = "{}";

    
}else
    $error="error recuperando datos de entrada.";

echo $json_entrada;
?>