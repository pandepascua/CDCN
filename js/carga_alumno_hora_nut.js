$(document).ready(function(){
    $('#run_alumno2').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_nutricion.php",
            data:{
                    token_datos_al_nu:$("#run_alumno2").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){
                        $('#token_id_al_h_nut').val("N/E");

                            $('#token_alumno2').val("N/E");



                    }else{
                        $('#token_id_al_h_nut').val(datosDPA.id_alumno);

                        $('#token_alumno2').val(datosDPA.run_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
