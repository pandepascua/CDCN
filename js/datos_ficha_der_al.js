$(document).ready(function(){
    $('#run_al1').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_f_der.php",
            data:{
                    token_f_der:$("#run_al1").val()
                    
            },
            success:function(data){
                          // alert(data);
                    datosAL = jQuery.parseJSON(data);
                    if(data=='{}'){
                            $('#token_al1').val("N/E");
                            $('#token_al2').val("N/E");
                            $('#token_al3').val("N/E");
                            $('#token_al4').val("N/E");
                            $('#token_al5').val("N/E");
                            $('#token_al6').val("N/E");

                            $('#token_al7').val("N/E");
                            $('#token_al8').val("N/E");
                            $('#token_al9').val("N/E");
                            $('#token_al10').val("N/E");
                            $('#token_al11').val("N/E");
                            $('#token_al12').val("N/E");
                            $('#token_al13').val("N/E");

                            $('#token_al14').val("N/E");
                            $('#token_al15').val("N/E");
                            $('#token_al16').val("N/E");
                            $('#token_al17').val("N/E");
                            $('#token_al18').val("N/E");
                            $('#token_al19').val("N/E");
                            $('#token_al20').val("N/E");

                            $('#token_al21').val("N/E");
                            $('#token_al22').val("N/E");
                            $('#token_al23').val("N/E");
                            $('#token_al24').val("N/E");
            


                    }else{
                        $('#token_al1').val(datosAL.id_derivacion);

                        $('#token_al2').val(datosAL.de);
                        $('#token_al3').val(datosAL.para);
                        $('#token_al4').val(datosAL.fecha_derivacion);
                        $('#token_al5').val(datosAL.nom_tratamiento);
                        $('#token_al6').val(datosAL.run_alumno);
                        $('#token_al7').val(datosAL.nom_alumno);
                        $('#token_al8').val(datosAL.edad);
                        $('#token_al9').val(datosAL.fecha_nac);
                        $('#token_al10').val(datosAL.telefono);
                        $('#token_al11').val(datosAL.direccion_alumno);
                        $('#token_al12').val(datosAL.establecimiento);
                        $('#token_al13').val(datosAL.curso);
                        $('#token_al14').val(datosAL.run_apod);
                        $('#token_al15').val(datosAL.nombre_apod);
                        $('#token_al16').val(datosAL.fech_nac_apod);
                        $('#token_al17').val(datosAL.edad_apod);
                        $('#token_al18').val(datosAL.domicilio_apod);
                        $('#token_al19').val(datosAL.parentesco_apod);
                        $('#token_al20').val(datosAL.descripcion_niño);
                        $('#token_al21').val(datosAL.nom_doc);
                        $('#token_al22').val(datosAL.nombre_institucion);
                        $('#token_al23').val(datosAL.responsable);
                        $('#token_al24').val(datosAL.cargo);




 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
