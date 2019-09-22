$(document).ready(function(){
    $('#run_dg').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_dg.php",
            data:{
                    token_dg:$("#run_dg").val()

                    
            },
            success:function(data){
                          // alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_alumno_dg').val("N/E");
                            $('#token_run_dg').val("N/E");
                            $('#nom_alumno').val("N/E");
                            $('#edad_alumno').val("N/E");
                            $('#fecha_nac').val("N/E");
                            $('#telefono_alumno').val("N/E");
                            $('#nom_apod').val("N/E");
                            $('#fono_apod').val("N/E");
                            $('#direccion').val("N/E");
                            $('#comuna').val("N/E");
                            $('#correo').val("N/E");
                            $('#patologias').val("N/E");

                    }else{
                        $('#token_alumno_dg').val(datosDPA.id_alumno);
                        $('#token_run_dg').val(datosDPA.run_alumno);
                            $('#nom_alumno').val(datosDPA.nom_alumno);
                            $('#edad_alumno').val(datosDPA.edad);
                             $('#fecha_nac').val(datosDPA.fecha_nac);
                            $('#telefono_alumno').val(datosDPA.telefono);
                            $('#nom_apod').val(datosDPA.nombre_apoderado);
                            $('#fono_apod').val(datosDPA.telefono_apod);
                            $('#direccion').val(datosDPA.direccion_alumno);
                            $('#comuna').val(datosDPA.comuna);
                            $('#correo').val(datosDPA.correo);
                            $('#patologias').val(datosDPA.patologias);



 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
