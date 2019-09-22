$(document).ready(function(){
    $('#run_alumno7').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_acup.php",
            data:{
                    token_datos_al_acup:$("#run_alumno7").val()
                    
            },
            success:function(data){
                          // alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_alumno_id').val("N/E");
                            $('#token_alumno7').val("N/E");



                    }else{
                        $('#token_alumno_id').val(datosDPA.id_alumno);
                        $('#token_alumno7').val(datosDPA.run_alumno);



 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
