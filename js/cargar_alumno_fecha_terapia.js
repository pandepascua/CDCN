$(document).ready(function(){
    $('#run_alumno7').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_terapia.php",
            data:{
                    token_datos_al_te:$("#run_alumno7").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPN = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_alumno7').val("N/E");




                    }else{
                        $('#token_alumno7').val(datosDPN.id_alumno);


 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
