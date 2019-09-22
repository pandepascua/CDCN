$(document).ready(function(){
    $('#run_alumno').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_nutricion.php",
            data:{
                    token_datos_al_nu:$("#run_alumno").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPN = jQuery.parseJSON(data);
                    if(data=='{}'){

    
                        $('#token_alumnoN').val("N/E");
                        $('#token_runN').val("N/E");
                        $('#nom_alumnoN').val("N/E");
                        $('#edad_alumnoN').val("N/E");
                        $('#fecha_nacN').val("N/E");
                        $('#telefono_alumnoN').val("N/E");
                        $('#nom_apodN').val("N/E");
                        $('#fono_apodN').val("N/E");
                        $('#direccionN').val("N/E");
                        $('#comunaN').val("N/E");
                        $('#correoN').val("N/E");
                        $('#patologiasN').val("N/E");


                    }else{
                        $('#token_alumnoN').val(datosDPN.id_alumno);
                        $('#token_runN').val(datosDPN.run_alumno);
                            $('#nom_alumnoN').val(datosDPN.nom_alumno);
                            $('#edad_alumnoN').val(datosDPN.edad);
                            $('#fecha_nacN').val(datosDPN.fecha_nac);
                            $('#telefono_alumnoN').val(datosDPN.telefono);
                            $('#nom_apodN').val(datosDPN.nombre_apoderado);
                            $('#fono_apodN').val(datosDPN.telefono_apod);
                            $('#direccionN').val(datosDPN.direccion_alumno);
                            $('#comunaN').val(datosDPN.comuna);
                            $('#correoN').val(datosDPN.correo);
                            $('#patologiasN').val(datosDPN.patologias);




 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
