<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
            Llenar un  formulario  con  datos del  servidor mediante Ajax: https://es.stackoverflow.com/q/128118/29967
        </title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <style type="text/css">
        </style>
    </head>
    <body>
        <div style="margin: 50px 10%;">
            <form id="myForm">
                <label for="actor_id">Id:</label>
                <input id="actor_id" type="text">
                <br />
                <label for="actor_nombre">Nombre:</label>
                <input id="actor_nombre" type="text">
                <br />
                <label for="actor_apellido">Apellido:</label>
                <input id="actor_apellido" type="text">
                <br />
                <label for="actor_sexo">Sexo:</label>
                <input id="actor_sexo" type="text">
                <br />
                <label for="last_update">Fecha:</label>
                <input id="last_update" type="text">
            </form>
            <hr />
            Escriba un id para buscar:<input id="id_criterio" type="number" value=1>
            <br />
            <button id="btnLlenar" type="button">Click para llenar Formulario</button>
        </div>
        <div id="error">
        </div>


        <script type="text/javascript">	
            $("#btnLlenar").click(function() {
                /*Esta es mi URL  y datos de prueba*/
                var myurl = "http://main.xfiddle.com/<?php echo pf_file('bvfj-j197'); ?>";
                var id_criterio=$('#id_criterio').val();
                var data={id:id_criterio};
                var request = $.ajax
                ({
                    url: myurl,
                    method: 'GET',
                    data: data  
                    //dataType:  'json' se recibirá un array que se parseará con parseJSON
                }
                );
                request.done(function( data ) 
                {
                    var data = $.parseJSON(data);
                    $.each(data, function(key, value)
                    {
                        /*Mostramos posibles  errores*/
                        if(value.hasOwnProperty('error')){
                            $('#error').text(value["error"]);
                        }else{
                            $.each(value, function(key, value){
                                $('#'+key).val(value);
                            });
                        }
                     });
                });

                request.fail(function( jqXHR, textStatus ) 
                {
                   alert( "Request failed: " + textStatus );
                });
            });
        </script>
        <?php
        ?>
    </body>
</html>