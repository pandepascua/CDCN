$(document).ready(function(){
    $('#run_1').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_evaluacion.php",
            data:{
                    token_evaluacion:$("#run_1").val()

                    
            },
            success:function(data){
                          // alert(data);
                    datosDPA = jQuery.parseJSON(data);
                       if(data=='{}'){
                        $('#id_evaluacion_1').val("N/E"); 
                        $('#run').val("N/E"); 
                        $('#fecha_eva').val("N/E"); 
                        $('#fc').val("N/E");
                        $('#pa').val("N/E");
                        $('#peso').val("N/E");
                        $('#talla').val("N/E"); 
                        $('#imc').val("N/E"); 
                        $('#plano_frontal').val("N/E"); 
                        $('#plano_sagital').val("N/E");
                        $('#plano_posterior').val("N/E");
                        $('#trapecio_superior').val("N/E");
                        $('#trapecio_medio').val("N/E"); 
                        $('#elevador_e').val("N/E"); 
                        $('#trapecio_inf').val("N/E"); 
                        $('#p_mayor').val("N/E");  
                        $('#serrato_ant').val("N/E");
                        $('#ecom').val("N/E"); 
                        $('#romboides').val("N/E"); 
                        $('#psoas').val("N/E");
                        $('#gluteos').val("N/E");
                        $('#r_anterior').val("N/E");
                        $('#abdominales').val("N/E"); 
                        $('#tfl').val("N/E");
                        $('#extensores').val("N/E");
                        $('#aductores').val("N/E");
                        $('#cuadriceps').val("N/E");
                        $('#cuadriceps_2').val("N/E"); 
                        $('#gluteos_isqui').val("N/E");
                        $('#gluteos_isqui_2').val("N/E");  
                        $('#isqui_ake').val("N/E");
                        $('#isqui_ake_2').val("N/E"); 
                        $('#psoas_1').val("N/E"); 
                        $('#psoas_2').val("N/E");
                        $('#piramidal').val("N/E");
                        $('#test').val("N/E"); 
                        $('#tfl_1').val("N/E"); 
                        $('#t_ober').val("N/E");  
                        $('#aductores_1').val("N/E");  
                        $('#aductores_2').val("N/E"); 
                        $('#gastronemios').val("N/E"); 
                        $('#gastronemios_2').val("N/E"); 
                        $('#soleo').val("N/E"); 
                        $('#soleo_2').val("N/E"); 
                        $('#test_wells').val("N/E"); 
                        $('#test_schobert').val("N/E"); 
                        $('#rot_hombro').val("N/E"); 
                        $('#rot_hombro_2').val("N/E"); 
                        $('#a').val("N/E"); 
                        $('#a_2').val("N/E"); 
                        $('#al').val("N/E"); 
                        $('#al_2').val("N/E"); 
                        $('#l').val("N/E"); 
                        $('#l_2').val("N/E"); 
                        $('#pl').val("N/E"); 
                        $('#pl_2').val("N/E"); 
                        $('#p').val("N/E"); 
                        $('#p_2').val("N/E"); 
                        $('#pm').val("N/E");
                        $('#pm_2').val("N/E"); 
                        $('#m').val("N/E"); 
                        $('#m_2').val("N/E"); 
                        $('#am').val("N/E");
                        $('#am_2').val("N/E"); 
                        $('#unipodal').val("N/E"); 
                        $('#unipodal_2').val("N/E"); 
                        $('#segmento').val("N/E"); 
                        $('#derecha').val("N/E"); 
                        $('#izquierda').val("N/E"); 
                        $('#angulo').val("N/E"); 
                        $('#segmento_2').val("N/E"); 
                        $('#derecha_2').val("N/E"); 
                        $('#izquierda_2').val("N/E"); 
                        $('#angulo_2').val("N/E");
                        $('#rot_int').val("N/E"); 
                        $('#rot_int_2').val("N/E"); 
                        $('#eeii').val("N/E"); 
                        $('#derecha_3').val("N/E"); 
                        $('#izquierda_3').val("N/E"); 
                        $('#puente_prono').val("N/E"); 
                        $('#puente').val("N/E"); 
                        $('#puente_2').val("N/E"); 
                        $('#extensores_2').val("N/E"); 
                        $('#abdominales_1').val("N/E");
                        $('#pulso1').val("N/E");
                        $('#pulso2').val("N/E"); 
                        $('#pulso3').val("N/E"); 
                        $('#valorC').val("N/E"); 
                        $('#ds').val("N/E"); 
                        $('#fms').val("N/E");
                        $('#hs').val("N/E"); 
                        $('#hs_2').val("N/E"); 
                        $('#hs_3').val("N/E"); 
                        $('#in_0').val("N/E"); 
                        $('#in_2').val("N/E"); 
                        $('#in_3').val("N/E"); 
                        $('#sm').val("N/E"); 
                        $('#sm_2').val("N/E"); 
                        $('#sm_3').val("N/E"); 
                        $('#aslr').val("N/E"); 
                        $('#aslr_2').val("N/E"); 
                        $('#aslr_3').val("N/E"); 
                        $('#tspu').val("N/E"); 
                        $('#tspu_2').val("N/E"); 
                        $('#tspu_3').val("N/E"); 
                        $('#rs').val("N/E"); 
                        $('#rs_2').val("N/E"); 
                        $('#rs_3').val("N/E"); 
                        $('#qc').val("N/E");
                        $('#triple_salto').val("N/E"); 
                        $('#core').val("N/E"); 
                        $('#funcion').val("N/E"); 
                        $('#tiempo').val("N/E"); 
                        $('#valor').val("N/E"); 
                        $('#bipodal').val("N/E"); 
                        $('#semi_tandem').val("N/E"); 
                        $('#tandem').val("N/E"); 
                        $('#tiempo_2').val("N/E"); 
                        $('#conclusiones').val("N/E");
                        $('#fecha').val("N/E"); 
                        $('#antendido').val("N/E");
                        $('#comentario').val("N/E");
                            

                    }else{
                        $('#id_evaluacion_1').val(datosDPA.id_evaluacion_1);
                        $('#run').val(datosDPA.run); 
                        
                        $('#fecha_eva').val(datosDPA.fecha_eva); 
                        $('#fc').val(datosDPA.fc);
                        $('#pa').val(datosDPA.pa);
                        $('#peso').val(datosDPA.peso);
                        $('#talla').val(datosDPA.talla); 
                        $('#imc').val(datosDPA.imc); 
                        $('#plano_frontal').val(datosDPA.plano_frontal); 
                        $('#plano_sagital').val(datosDPA.plano_sagital);
                        $('#plano_posterior').val(datosDPA.plano_posterior);
                        $('#trapecio_superior').val(datosDPA.trapecio_superior);
                        $('#trapecio_medio').val(datosDPA.trapecio_medio); 
                        $('#elevador_e').val(datosDPA.elevador_e); 
                        $('#trapecio_inf').val(datosDPA.trapecio_inf); 
                        $('#p_mayor').val(datosDPA.p_mayor);  
                        $('#serrato_ant').val(datosDPA.serrato_ant);
                        $('#ecom').val(datosDPA.ecom); 
                        $('#romboides').val(datosDPA.romboides); 
                        $('#psoas').val(datosDPA.psoas);
                        $('#gluteos').val(datosDPA.gluteos);
                        $('#r_anterior').val(datosDPA.r_anterior);
                        $('#abdominales').val(datosDPA.abdominales); 
                        $('#tfl').val(datosDPA.tfl);
                        $('#extensores').val(datosDPA.extensores);
                        $('#aductores').val(datosDPA.aductores);
                        $('#cuadriceps').val(datosDPA.cuadriceps);
                        $('#cuadriceps_2').val(datosDPA.cuadriceps_2); 
                        $('#gluteos_isqui').val(datosDPA.gluteos_isqui);
                        $('#gluteos_isqui_2').val(datosDPA.gluteos_isqui_2);  
                        $('#isqui_ake').val(datosDPA.isqui_ake);
                        $('#isqui_ake_2').val(datosDPA.isqui_ake_2); 
                        $('#psoas_1').val(datosDPA.psoas_1); 
                        $('#psoas_2').val(datosDPA.psoas_2);
                        $('#piramidal').val(datosDPA.piramidal);
                        $('#test').val(datosDPA.test); 
                        $('#tfl_1').val(datosDPA.tfl_1); 
                        $('#t_ober').val(datosDPA.t_ober);  
                        $('#aductores_1').val(datosDPA.aductores_1);  
                        $('#aductores_2').val(datosDPA.aductores_2); 
                        $('#gastronemios').val(datosDPA.gastronemios); 
                        $('#gastronemios_2').val(datosDPA.gastronemios_2); 
                        $('#soleo').val(datosDPA.soleo); 
                        $('#soleo_2').val(datosDPA.soleo_2); 
                        $('#test_wells').val(datosDPA.test_wells); 
                        $('#test_schobert').val(datosDPA.test_schobert); 
                        $('#rot_hombro').val(datosDPA.rot_hombro); 
                        $('#rot_hombro_2').val(datosDPA.rot_hombro_2); 
                        $('#a').val(datosDPA.a); 
                        $('#a_2').val(datosDPA.a_2); 
                        $('#al').val(datosDPA.al); 
                        $('#al_2').val(datosDPA.al_2); 
                        $('#l').val(datosDPA.l); 
                        $('#l_2').val(datosDPA.l_2); 
                        $('#pl').val(datosDPA.pl); 
                        $('#pl_2').val(datosDPA.pl_2); 
                        $('#p').val(datosDPA.p); 
                        $('#p_2').val(datosDPA.p_2); 
                        $('#pm').val(datosDPA.pm);
                        $('#pm_2').val(datosDPA.pm_2); 
                        $('#m').val(datosDPA.m); 
                        $('#m_2').val(datosDPA.m_2); 
                        $('#am').val(datosDPA.am);
                        $('#am_2').val(datosDPA.am_2); 
                        $('#unipodal').val(datosDPA.unipodal); 
                        $('#unipodal_2').val(datosDPA.unipodal_2); 
                        $('#segmento').val(datosDPA.segmento); 
                        $('#derecha').val(datosDPA.derecha); 
                        $('#izquierda').val(datosDPA.izquierda); 
                        $('#angulo').val(datosDPA.angulo); 
                        $('#segmento_2').val(datosDPA.segmento_2); 
                        $('#derecha_2').val(datosDPA.derecha_2); 
                        $('#izquierda_2').val(datosDPA.izquierda_2); 
                        $('#angulo_2').val(datosDPA.angulo_2);
                        $('#rot_int').val(datosDPA.rot_int); 
                        $('#rot_int_2').val(datosDPA.rot_int_2); 
                        $('#eeii').val(datosDPA.eeii); 
                        $('#derecha_3').val(datosDPA.derecha_3); 
                        $('#izquierda_3').val(datosDPA.izquierda_3); 
                        $('#puente_prono').val(datosDPA.puente_prono); 
                        $('#puente').val(datosDPA.puente); 
                        $('#puente_2').val(datosDPA.puente_2); 
                        $('#extensores_2').val(datosDPA.extensores_2); 
                        $('#abdominales_1').val(datosDPA.abdominales_1);
                        $('#pulso1').val(datosDPA.pulso1);
                        $('#pulso2').val(datosDPA.pulso2); 
                        $('#pulso3').val(datosDPA.pulso3); 
                        $('#valorC').val(datosDPA.valorC); 
                        $('#ds').val(datosDPA.ds); 
                        $('#fms').val(datosDPA.fms);
                        $('#hs').val(datosDPA.hs); 
                        $('#hs_2').val(datosDPA.hs_2); 
                        $('#hs_3').val(datosDPA.hs_3); 
                        $('#in_0').val(datosDPA.in_0); 
                        $('#in_2').val(datosDPA.in_2); 
                        $('#in_3').val(datosDPA.in_3); 
                        $('#sm').val(datosDPA.sm); 
                        $('#sm_2').val(datosDPA.sm_2); 
                        $('#sm_3').val(datosDPA.sm_3); 
                        $('#aslr').val(datosDPA.aslr_2); 
                        $('#aslr_2').val(datosDPA.aslr_2); 
                        $('#aslr_3').val(datosDPA.aslr_3); 
                        $('#tspu').val(datosDPA.tspu); 
                        $('#tspu_2').val(datosDPA.tspu_2); 
                        $('#tspu_3').val(datosDPA.tspu_3); 
                        $('#rs').val(datosDPA.rs); 
                        $('#rs_2').val(datosDPA.rs_2); 
                        $('#rs_3').val(datosDPA.rs_3); 
                        $('#qc').val(datosDPA.qc);
                        $('#triple_salto').val(datosDPA.triple_salto); 
                        $('#core').val(datosDPA.core); 
                        $('#funcion').val(datosDPA.funcion); 
                        $('#tiempo').val(datosDPA.tiempo); 
                        $('#valor').val(datosDPA.valor); 
                        $('#bipodal').val(datosDPA.bipodal); 
                        $('#semi_tandem').val(datosDPA.semi_tandem); 
                        $('#tandem').val(datosDPA.tandem); 
                        $('#tiempo_2').val(datosDPA.tiempo_2);
                        $('#conclusiones').val(datosDPA.conclusiones);
                        $('#fecha').val(datosDPA.fecha); 
                        $('#antendido').val(datosDPA.antendido);
                        $('#comentario').val(datosDPA.comentario);
                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
