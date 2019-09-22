$(document).ready(function(){
    $('#run_alumno').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_psi.php",
            data:{
                    token_datos_al_psi:$("#run_alumno").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPP = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_alumno').val("N/E");
                            $('#token_runP').val("N/E");
                            $('#nom_alumnoP').val("N/E");
                            $('#edad_alumnoP').val("N/E");
                            $('#fecha_nacP').val("N/E");
                            $('#telefono_alumnoP').val("N/E");
                            $('#nom_apodP').val("N/E");
                            $('#fono_apodP').val("N/E");
                            $('#direccionP').val("N/E");
                            $('#comunaP').val("N/E");
                            $('#correoP').val("N/E");
                            $('#patologiasP').val("N/E");



                    }else{
                        $('#token_alumno').val(datosDPP.id_alumno);

                        $('#token_runP').val(datosDPP.run_alumno);
                            $('#nom_alumnoP').val(datosDPP.nom_alumno);
                            $('#edad_alumnoP').val(datosDPP.edad);
                            $('#fecha_nacP').val(datosDPP.fecha_nac);
                            $('#telefono_alumnoP').val(datosDPP.telefono);
                            $('#nom_apodP').val(datosDPP.nombre_apoderado);
                            $('#fono_apodP').val(datosDPP.telefono_apod);
                            $('#direccionP').val(datosDPP.direccion_alumno);
                            $('#comunaP').val(datosDPP.comuna);
                            $('#correoP').val(datosDPP.correo);
                            $('#patologiasP').val(datosDPP.patologias);



 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
