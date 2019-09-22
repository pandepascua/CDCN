$(document).ready(function(){
    $('#run_alumno5').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_psi.php",
            data:{
                    token_datos_al_psi:$("#run_alumno5").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){
                        $('#token_id_al_p_psi').val("N/E");

                            $('#token_alumno5').val("N/E");



                    }else{
                        $('#token_id_al_p_psi').val(datosDPA.id_alumno);

                        $('#token_alumno5').val(datosDPA.run_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
