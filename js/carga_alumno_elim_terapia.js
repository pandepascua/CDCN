$(document).ready(function(){
    $('#run_alumno6').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_terapia.php",
            data:{
                    token_datos_al_te:$("#run_alumno6").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_alumno6').val("N/E");



                    }else{
                        $('#token_alumno6').val(datosDPA.id_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
