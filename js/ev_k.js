$(document).ready(function(){
    $('#run_ek').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_dg.php",
            data:{
                    token_dg:$("#run_ek").val()

                    
            },
            success:function(data){
                           //alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_alumno_ek').val("N/E");
                            $('#token_run_ek').val("N/E");
                            $('#nom_alumno_ek').val("N/E");
                            $('#edad_alumno_ek').val("N/E");
                            $('#fecha_nac_ek').val("N/E");
                            $('#telefono_alumno_ek').val("N/E");
                            $('#nom_apod_ek').val("N/E");
                            $('#fono_apod_ek').val("N/E");
                            $('#direccion_ek').val("N/E");
                            $('#comuna_ek').val("N/E");
                            $('#correo_ek').val("N/E");
                            $('#patologias_ek').val("N/E");

                    }else{
                        $('#token_alumno_ek').val(datosDPA.id_alumno);
                        $('#token_run_ek').val(datosDPA.run_alumno);
                            $('#nom_alumno_ek').val(datosDPA.nom_alumno);
                            $('#edad_alumno_ek').val(datosDPA.edad);
                             $('#fecha_nac_ek').val(datosDPA.fecha_nac);
                            $('#telefono_alumno_ek').val(datosDPA.telefono);
                            $('#nom_apod_ek').val(datosDPA.nombre_apoderado);
                            $('#fono_apod_ek').val(datosDPA.telefono_apod);
                            $('#direccion_ek').val(datosDPA.direccion_alumno);
                            $('#comuna_ek').val(datosDPA.comuna);
                            $('#correo_ek').val(datosDPA.correo);
                            $('#patologias_ek').val(datosDPA.patologias);



 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
