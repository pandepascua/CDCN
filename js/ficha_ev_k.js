$(document).ready(function(){
    $('#run_ev_k2').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_ev_k.php",
            data:{
                    token_ev_k:$("#run_ev_k2").val()

                    
            },
            success:function(data){
                          // alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){

                        $('#token_id_ek').val("N/E");
                        $('#token_run_ev_k').val("N/E");
                            $('#nom_alumno_ev_k').val("N/E");
                            $('#fech_eva').val("N/E");
                             $('#diag_medico').val("N/E");
                            $('#plano_frontal').val("N/E");
                            $('#plano_sagital').val("N/E");
                            $('#plano_posterior').val("N/E");
                            $('#zona_dolor').val("N/E");
                            $('#eva_dolor').val("N/E");
                            $('#tipo').val("N/E");
                            $('#localizacion').val("N/E");
                            $('#generador').val("N/E");
                            $('#atenuante').val("N/E");
                          $('#otros_dolor').val("N/E");
                          $('#eva_dolor_2').val("N/E");
                          $('#tipo_2').val("N/E");
                          $('#localizacion_2').val("N/E");
                          $('#generador_2').val("N/E");
                          $('#atenuante_2').val("N/E");
                          $('#otros_dolor_2').val("N/E");
                          $('#superficial').val("N/E");
                          $('#profundidad').val("N/E");
                          $('#dimension').val("N/E");
                          $('#estado').val("N/E");
                          $('#segmento1').val("N/E");
                          $('#der1').val("N/E");
                          $('#izq1').val("N/E");
                          $('#segmento2').val("N/E");
                          $('#der2').val("N/E");
                          $('#izq2').val("N/E");
                          $('#segmento3').val("N/E");
                          $('#der3').val("N/E");
                          $('#izq3').val("N/E");
                            $('#articulacion').val("N/E");
                            $('#activo_der').val("N/E");
                            $('#activo_izq').val("N/E");
                            $('#pasivo_der').val("N/E");
                            $('#pasivo_izq').val("N/E");
                            $('#edfeal_der').val("N/E");
                            $('#endfeal_izq').val("N/E");
                            $('#articulacion1').val("N/E");
                           $('#articulacion2').val("N/E");
                           $('#articulacion3').val("N/E");
                           $('#flexion_der').val("N/E");
                           $('#flexion_izq').val("N/E");
                           $('#extension_der').val("N/E");
                           $('#extension_izq').val("N/E");
                           $('#abd_der').val("N/E");
                           $('#abd_izq').val("N/E");
                           $('#add_der').val("N/E");
                          $('#add_izq').val("N/E");
                          $('#rot_int_der').val("N/E");
                          $('#rot_int_izq').val("N/E");
                          $('#rot_ext_der').val("N/E");
                          $('#rot_ext_izq').val("N/E");
                          $('#pruebas_funcionales').val("N/E");
                          $('#fecha_sesiones').val("N/E");
                          $('#atendido').val("N/E");
                          $('#n_sesion').val("N/E");
                          $('#otro').val("N/E");


                    }else{
                        $('#token_id_ek').val(datosDPA.id_evaluacion_kine);
                        $('#token_run_ev_k').val(datosDPA.run_alumno);
                            $('#nom_alumno_ev_k').val(datosDPA.nom_alumno);
                            $('#fech_eva').val(datosDPA.fecha_evaluacion);
                             $('#diag_medico').val(datosDPA.diagnostico_medico);
                            $('#plano_frontal').val(datosDPA.plano_frontal);
                            $('#plano_sagital').val(datosDPA.plano_sagital);
                            $('#plano_posterior').val(datosDPA.plano_posterior);
                            $('#zona_dolor').val(datosDPA.zona_dolor);
                            $('#eva_dolor').val(datosDPA.eva_dolor);
                            $('#tipo').val(datosDPA.tipo);
                            $('#localizacion').val(datosDPA.localizacion);
                            $('#generador').val(datosDPA.generador);
                            $('#atenuante').val(datosDPA.atenuante);
                          $('#otros_dolor').val(datosDPA.otros_dolor);
                          $('#eva_dolor_2').val(datosDPA.eva_dolor2);
                          $('#tipo_2').val(datosDPA.tipo_2);
                          $('#localizacion_2').val(datosDPA.localizacion_2);
                          $('#generador_2').val(datosDPA.generador_2);
                          $('#atenuante_2').val(datosDPA.atenuante_2);
                          $('#otros_dolor_2').val(datosDPA.otros_dolor_2);
                          $('#superficial').val(datosDPA.superficial);
                          $('#profundidad').val(datosDPA.profundidad);
                          $('#dimension').val(datosDPA.dimension);
                          $('#estado').val(datosDPA.estado);
                          $('#segmento1').val(datosDPA.segmento1);
                          $('#der1').val(datosDPA.der1);
                          $('#izq1').val(datosDPA.izq1);
                          $('#segmento2').val(datosDPA.segmento2);
                          $('#der2').val(datosDPA.der2);
                          $('#izq2').val(datosDPA.izq2);
                          $('#segmento3').val(datosDPA.segmento3);
                          $('#der3').val(datosDPA.der3);
                          $('#izq3').val(datosDPA.izq3);
                            $('#articulacion').val(datosDPA.articulacion);
                            $('#activo_der').val(datosDPA.activo_der);
                            $('#activo_izq').val(datosDPA.activo_izq);
							$('#pasivo_der').val(datosDPA.pasivo_der);
                            $('#pasivo_izq').val(datosDPA.pasivo_izq);
                            $('#edfeal_der').val(datosDPA.edfeal_der);
                            $('#endfeal_izq').val(datosDPA.endfeal_izq);
                            $('#articulacion1').val(datosDPA.articulacion1);
                           $('#articulacion2').val(datosDPA.articulacion2);
                           $('#articulacion3').val(datosDPA.articulacion3);
                           $('#flexion_der').val(datosDPA.flexion_der);
                           $('#flexion_izq').val(datosDPA.flexion_izq);
                           $('#extension_der').val(datosDPA.extencion_der);
                           $('#extension_izq').val(datosDPA.extencion_izq);
                           $('#abd_der').val(datosDPA.abd_der);
                           $('#abd_izq').val(datosDPA.abd_izq);
                           $('#add_der').val(datosDPA.add_der);
                          $('#add_izq').val(datosDPA.add_izq);
                          $('#rot_int_der').val(datosDPA.rot_int_der);
                          $('#rot_int_izq').val(datosDPA.rot_int_izq);
                          $('#rot_ext_der').val(datosDPA.rot_ext_der);
                          $('#rot_ext_izq').val(datosDPA.rot_ext_izq);
                          $('#pruebas_funcionales').val(datosDPA.pruebas_funcionales);
                          $('#fecha_sesiones').val(datosDPA.fecha_sesiones);
                          $('#atendido').val(datosDPA.atendido);
                          $('#n_sesion').val(datosDPA.n_sesion);
                          $('#otro').val(datosDPA.otro);

                           
                           
 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
