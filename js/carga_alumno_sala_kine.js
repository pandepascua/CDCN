$(document).ready(function(){
    $('#run_alumno4').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_kine.php",
            data:{
                    token_datos_al_kine:$("#run_alumno4").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){
                        $('#token_id_al_sl_kine').val("N/E");
                            $('#token_alumno4').val("N/E");



                    }else{
                        $('#token_id_al_sl_kine').val(datosDPA.id_alumno);
                        $('#token_alumno4').val(datosDPA.run_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
