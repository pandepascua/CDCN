$(document).ready(function(){
    $('#run').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_kine.php",
            data:{
                    token_datos_al_kine:$("#run").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPK = jQuery.parseJSON(data);
                    if(data=='{}'){

                        $('#token_alumnoK').val("N/E");
                        $('#token_runK').val("N/E");
                        $('#nom_alumnoK').val("N/E");
                        $('#edad_alumnoK').val("N/E");
                        $('#fecha_nacK').val("N/E");
                        $('#telefono_alumnoK').val("N/E");
                        $('#nom_apodK').val("N/E");
                        $('#fono_apodK').val("N/E");
                        $('#direccionK').val("N/E");
                        $('#comunaK').val("N/E");
                        $('#correoK').val("N/E");
                        $('#patologiasK').val("N/E");


                    }else{
                        $('#token_alumnoK').val(datosDPK.id_alumno);
                        $('#token_runK').val(datosDPK.run_alumno);
                            $('#nom_alumnoK').val(datosDPK.nom_alumno);
                            $('#edad_alumnoK').val(datosDPK.edad);
                            $('#fecha_nacK').val(datosDPK.fecha_nac);
                            $('#telefono_alumnoK').val(datosDPK.telefono);
                            $('#nom_apodK').val(datosDPK.nombre_apoderado);
                            $('#fono_apodK').val(datosDPK.telefono_apod);
                            $('#direccionK').val(datosDPK.direccion_alumno);
                            $('#comunaK').val(datosDPK.comuna);
                            $('#correoK').val(datosDPK.correo);
                            $('#patologiasK').val(datosDPK.patologias);


                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
