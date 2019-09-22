$(document).ready(function(){
    $('#run7').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_maso.php",
            data:{
                    token_datos_al_maso:$("#run7").val()
                    
            },
            success:function(data){
                          // alert(data);
                    datosDPM = jQuery.parseJSON(data);
                    if(data=='{}'){
                        $('#token_id_el').val("N/E");
                            $('#token_run7').val("N/E");




                    }else{
                        $('#token_id_el').val(datosDPM.id_alumno);
                        $('#token_run7').val(datosDPM.run_alumno);




 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
