$(document).ready(function(){
    $('#run_entrevista').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_maso.php",
            data:{
                    token_datos_al_maso:$("#run_entrevista").val()
                    
            },
            success:function(data){
                          //alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){
                        $('#token_id_entrevista').val("N/E");

                            $('#token_alumno2').val("N/E");



                    }else{
                        $('#token_id_entrevista').val(datosDPA.id_alumno);

                        $('#token_alumno2').val(datosDPA.run_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
