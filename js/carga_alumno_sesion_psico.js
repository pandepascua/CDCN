$(document).ready(function(){
    $('#run_alumno3').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_psi.php",
            data:{
                    token_datos_al_psi:$("#run_alumno3").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){
                        $('#token_id_al_sl_psi').val("N/E");
                            $('#token_alumno3').val("N/E");



                    }else{
                        $('#token_id_al_s_psi').val(datosDPA.id_alumno);
                        $('#token_alumno3').val(datosDPA.run_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
