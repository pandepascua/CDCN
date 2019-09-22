$(document).ready(function(){
    $('#run_el').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_carga_mod_dg.php",
            data:{
                    token_mod_dg:$("#run_el").val()

                    
            },
            success:function(data){
                           //alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#el_dg1').val("N/E");
                            $('#el_dg2').val("N/E");
                            $('#el_dg3').val("N/E");
                            $('#el_dg4').val("N/E");
                            $('#el_dg5').val("N/E");
                            $('#el_dg6').val("N/E");
                            $('#el_dg7').val("N/E");
                            $('#el_dg8').val("N/E");
                            $('#el_dg9').val("N/E");
                            $('#el_dg10').val("N/E");
                            $('#el_dg11').val("N/E");
                            $('#el_dg12').val("N/E");
                            $('#el_dg13').val("N/E");
                            //$('#token_dg14').val("N/E");
                            //$('#token_dg15').val("N/E");
                            //$('#token_dg16').val("N/E");
                            //$('#token_dg17').val("N/E");
                            //$('#token_dg18').val("N/E");
                            //$('#token_dg19').val("N/E");
                            //$('#token_dg20').val("N/E");
                            //$('#token_dg21').val("N/E");
                            //$('#token_dg22').val("N/E");
                            //$('#token_dg23').val("N/E");
                            //$('#token_dg24').val("N/E");
                            //$('#token_dg25').val("N/E");
                            $('#el_dg26').val("N/E");
                            $('#el_dg27').val("N/E");
                            $('#el_dg28').val("N/E");
                            $('#el_dg29').val("N/E");

                    }else{
                        $('#el_dg1').val(datosDPA.id_dg);
                        $('#el_dg2').val(datosDPA.run_alumno);
                        $('#el_dg3').val(datosDPA.nom_alumno);
                        $('#el_dg4').val(datosDPA.edad);
                        $('#el_dg5').val(datosDPA.fecha_nac);
                        $('#el_dg6').val(datosDPA.telefono);
                        $('#el_dg7').val(datosDPA.direccion_alumno);
                        $('#el_dg8').val(datosDPA.correo);
                        $('#el_dg9').val(datosDPA.patologias);
                        $('#el_dg10').val(datosDPA.diagnostico);
                        $('#el_dg11').val(datosDPA.ocupacion);
                        $('#el_dg12').val(datosDPA.fecha_ingreso);
                        $('#el_dg13').val(datosDPA.motivo);
                        //$('#token_dg14').val(datosDPA.enf_mor);
                        //$('#token_dg15').val(datosDPA.año_mor);
                        //$('#token_dg16').val(datosDPA.control_mor);
                        //$('#token_dg17').val(datosDPA.cirujia);
                        //$('#token_dg18').val(datosDPA.año_quir);
                        //$('#token_dg19').val(datosDPA.descripcion);
                        //$('#token_dg20').val(datosDPA.año_ant);
                        //$('#token_dg21').val(datosDPA.estado_ant);
                      //  $('#token_dg22').val(datosDPA.nom_habito);
                        //$('#token_dg23').val(datosDPA.otros);
                        //$('#token_dg24').val(datosDPA.medicamento);
                        //$('#token_dg25').val(datosDPA.dosis);
                        $('#el_dg26').val(datosDPA.actividad_fisica);
                        $('#el_dg27').val(datosDPA.anamnesis);
                        $('#el_dg28').val(datosDPA.id_taller);
                        $('#el_dg29').val(datosDPA.nom_taller);


                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
