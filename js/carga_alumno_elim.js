$(document).ready(function(){
    $('#run_alumno6').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_psi.php",
            data:{
                    token_datos_al_psi:$("#run_alumno6").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){
                        $('#token_id_al_el_psi').val("N/E");
                            $('#token_alumno6').val("N/E");



                    }else{
                        $('#token_id_al_el_psi').val(datosDPA.id_alumno);

                        $('#token_alumno6').val(datosDPA.run_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
