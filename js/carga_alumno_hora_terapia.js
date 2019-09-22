$(document).ready(function(){
    $('#run_alumno2').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_terapia.php",
            data:{
                    token_datos_al_te:$("#run_alumno2").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_alumno2').val("N/E");



                    }else{
                        $('#token_alumno2').val(datosDPA.id_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
