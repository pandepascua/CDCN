$(document).ready(function(){
    $('#run').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_al_ter_mod.php",
            data:{
                token_al_ter_mod:$("#run").val()
                    
            },
            success:function(data){
                          // alert(data);
                    datosDPN = jQuery.parseJSON(data);
                    if(data=='{}'){   
                            
                            $('#token_run').val("N/E");
                            $('#token_nombre').val("N/E");
                            $('#token_fecha_nacimiento').val("N/E");
                            $('#token_edad').val("N/E");
                            $('#token_fecha_ingreso').val("N/E");
                            $('#token_parentesco').val("N/E");
                            $('#token_telefono').val("N/E");
                            $('#token_diagnostico').val("N/E");
                            $('#token_motivo_consulta').val("N/E");
                            $('#token_id_sala').val("N/E");
                            $('#token_nom_sala').val("N/E");

                            $('#token_antecedentes_pre_natales').val("N/E");
                            $('#token_antecedentes_peri_natales').val("N/E");
                            $('#token_antecedentes_clinicos').val("N/E");
                            $('#token_control_cabeza').val("N/E");
                            $('#token_primeras_palabras').val("N/E");
                            $('#token_gateo').val("N/E");
                            $('#token_primeras_frases').val("N/E");
                            $('#token_marcha_independiente').val("N/E");
                            $('#token_control_esfinter').val("N/E");
                            $('#token_edad_escolar').val("N/E");
                            $('#token_asistio_jardin').val("N/E");
                            $('#token_nombre_colegio').val("N/E");
                            $('#token_curso').val("N/E");
                            $('#token_n_establecimiento').val("N/E");
                            $('#token_motivo_cambio').val("N/E");
                            $('#token_observaciones').val("N/E");
                            $('#token_genograma_familiar').val("N/E");
                            $('#token_red_apoyo').val("N/E");
                            $('#token_otros_antecedentes').val("N/E");
                            $('#token_impresion_general').val("N/E");
                            $('#token_avdb').val("N/E");
                            $('#token_avdi').val("N/E");
                            $('#token_participacion_social').val("N/E");
                            $('#token_juego').val("N/E");
                            $('#token_descanso_sueño').val("N/E");
                            $('#token_comunicacion').val("N/E");
                            $('#token_adaptarce_situacion').val("N/E");
                            $('#token_regulacion_emocional').val("N/E");
                            $('#token_cumplir_rutinas').val("N/E");
                            $('#token_aceptar_cumplir').val("N/E");
                            $('#token_participar_actividades').val("N/E");
                            $('#token_dificultades_sensoriales').val("N/E");
                            $('#token_otros1').val("N/E");
                            $('#token_otros2').val("N/E");
                            $('#token_expectativas_prioridades').val("N/E");

                    }else{
                        
                        $('#token_run').val(datosDPN.run );
                        $('#token_nombre').val(datosDPN.nombre);
                        $('#token_fecha_nacimiento').val(datosDPN.fecha_nacimiento);
                        $('#token_edad').val(datosDPN.edad );
                        $('#token_fecha_ingreso').val(datosDPN.fecha_ingreso );
                        $('#token_parentesco').val(datosDPN.parentesco );
                        $('#token_telefono').val(datosDPN.telefono );
                        $('#token_diagnostico').val(datosDPN.diagnostico);
                        $('#token_motivo_consulta').val(datosDPN.motivo_consulta );
                        $('#token_id_sala').val(datosDPN.id_sala);
                        $('#token_nom_sala').val(datosDPN.nom_sala);

                        $('#token_antecedentes_pre_natales').val(datosDPN.antecedentes_pre_natales );
                        $('#token_antecedentes_peri_natales').val(datosDPN.antecedentes_peri_natales );
                        $('#token_antecedentes_clinicos').val(datosDPN.antecedentes_clinicos );
                        $('#token_control_cabeza').val(datosDPN.control_cabeza );
                        $('#token_primeras_palabras').val(datosDPN.primeras_palabras );
                        $('#token_gateo').val(datosDPN.gateo );
                        $('#token_primeras_frases').val(datosDPN.primeras_frases);
                        $('#token_marcha_independiente').val(datosDPN.marcha_independiente );
                        $('#token_control_esfinter').val(datosDPN.control_esfinter );
                        $('#token_edad_escolar').val(datosDPN.edad_escolar );
                        $('#token_asistio_jardin').val(datosDPN.asistio_jardin );
                        $('#token_nombre_colegio').val(datosDPN.nombre_colegio );
                        $('#token_curso').val(datosDPN.curso);
                        $('#token_n_establecimiento').val(datosDPN.n_establecimiento );
                        $('#token_motivo_cambio').val(datosDPN.motivo_cambio );
                        $('#token_observaciones').val(datosDPN.observaciones );
                        $('#token_genograma_familiar').val(datosDPN.genograma_familiar );
                        $('#token_red_apoyo').val(datosDPN.red_apoyo );
                        $('#token_otros_antecedentes').val(datosDPN.otros_antecedentes);
                        $('#token_impresion_general').val(datosDPN.impresion_general);
                        $('#token_avdb').val(datosDPN.avdb );
                        $('#token_avdi').val(datosDPN.avdi);
                        $('#token_participacion_social').val(datosDPN.participacion_social);
                        $('#token_juego').val(datosDPN.juego);
                        $('#token_descanso_sueño').val(datosDPN.descanso_sueño );
                        $('#token_comunicacion').val(datosDPN.comunicacion);
                        $('#token_adaptarce_situacion').val(datosDPN.adaptarce_situacion);
                        $('#token_regulacion_emocional').val(datosDPN.regulacion_emocional);
                        $('#token_cumplir_rutinas').val(datosDPN.cumplir_rutinas);
                        $('#token_aceptar_cumplir').val(datosDPN.aceptar_cumplir);
                        $('#token_participar_actividades').val(datosDPN.participar_actividades);
                        $('#token_dificultades_sensoriales').val(datosDPN.dificultades_sensoriales);
                        $('#token_otros1').val(datosDPN.otros1);
                        $('#token_otros2').val(datosDPN.otros2);
                        $('#token_expectativas_prioridades').val(datosDPN.expectativas_prioridades);

                        



 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
