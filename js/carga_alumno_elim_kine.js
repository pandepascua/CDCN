$(document).ready(function(){
    $('#run_alumno_el').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_kine.php",
            data:{
                    token_datos_al_kine:$("#run_alumno_el").val()
                    
            },
            success:function(data){
                          // alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){
                        $('#el_alumno_id').val("N/E");

                            $('#token_alumno_el').val("N/E");



                    }else{
                        $('#el_alumno_id').val(datosDPA.id_alumno);

                        $('#token_alumno_el').val(datosDPA.run_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
