$(document).ready(function(){
    $('#run_alumno7').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_nutricion.php",
            data:{
                    token_datos_al_nu:$("#run_alumno7").val()
                    
            },
            success:function(data){
                          // alert(data);
                    datosDPN = jQuery.parseJSON(data);
                    if(data=='{}'){
                        $('#token_id_el').val("N/E");

                            $('#token_alumno7').val("N/E");




                    }else{
                        $('#token_id_el').val(datosDPN.id_alumno);

                        $('#token_alumno7').val(datosDPN.run_alumno);


 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
