$(document).ready(function(){
    $('#run_alumno').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_terapia.php",
            data:{
                    token_datos_al_te:$("#run_alumno").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPN = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_alumno').val("N/E");
                            $('#nom_alumno').val("N/E");
                            $('#edad_alumno').val("N/E");
                            $('#telefono_alumno').val("N/E");
                            $('#nom_taller').val("N/E");
                            $('#token_taller').val("N/E");



                    }else{
                        $('#token_alumno').val(datosDPN.id_alumno);
                            $('#nom_alumno').val(datosDPN.nom_alumno);
                            $('#edad_alumno').val(datosDPN.edad);
                            $('#telefono_alumno').val(datosDPN.telefono);
                            $('#nom_taller').val(datosDPN.nom_taller);
                            $('#token_taller').val(datosDPN.id_taller);



 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
