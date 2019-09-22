$(document).ready(function(){
    $('#run_alumno6').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_acup.php",
            data:{
                    token_datos_al_acup:$("#run_alumno6").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){
                        $('#token_id_el').val("N/E");

                            $('#token_run_el').val("N/E");



                    }else{
                        $('#token_id_el').val(datosDPA.id_alumno);

                        $('#token_run_el').val(datosDPA.run_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
