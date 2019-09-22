$(document).ready(function(){
        $('#run').focusout(function(){
                $.ajax({
                method:"post",
                url:"/cdcn/token_agendamiento_maso.php",
                data:{
                        token_datos_al_maso:$("#run").val()
                        
                },
                success:function(data){
                               //alert(data);
                        datosDPK = jQuery.parseJSON(data);
                        if(data=='{}'){
    
                            $('#token_alumnoM').val("N/E");
                            $('#token_runM').val("N/E");
                            $('#nom_alumnoM').val("N/E");
                            $('#edad_alumnoM').val("N/E");
                            $('#fecha_nacM').val("N/E");
                            $('#telefono_alumnoM').val("N/E");
                            $('#nom_apodM').val("N/E");
                            $('#fono_apodM').val("N/E");
                            $('#direccionM').val("N/E");
                            $('#comunaM').val("N/E");
                            $('#correoM').val("N/E");
                            $('#patologiasM').val("N/E");
    
    
                        }else{
                            $('#token_alumnoM').val(datosDPK.id_alumno);
                            $('#token_runM').val(datosDPK.run_alumno);
                                $('#nom_alumnoM').val(datosDPK.nom_alumno);
                                $('#edad_alumnoM').val(datosDPK.edad);
                                $('#fecha_nacM').val(datosDPK.fecha_nac);
                                $('#telefono_alumnoM').val(datosDPK.telefono);
                                $('#nom_apodM').val(datosDPK.nombre_apoderado);
                                $('#fono_apodM').val(datosDPK.telefono_apod);
                                $('#direccionM').val(datosDPK.direccion_alumno);
                                $('#comunaM').val(datosDPK.comuna);
                                $('#correoM').val(datosDPK.correo);
                                $('#patologiasM').val(datosDPK.patologias);
    
    
                        }
    
                },
                error:function(){
                                
                        }
                });  
        });
    });
    