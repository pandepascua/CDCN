$(document).ready(function(){
    $('#run_al').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_maso.php",
            data:{
                    token_datos_al_maso:$("#run_al").val()
                    
            },
            success:function(data){
                          // alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){
                        $('#token_run_id_al').val("N/E");
                            $('#token_run_al').val("N/E");



                    }else{
                        $('#token_run_id_al').val(datosDPA.id_alumno);

                        $('#token_run_al').val(datosDPA.run_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
