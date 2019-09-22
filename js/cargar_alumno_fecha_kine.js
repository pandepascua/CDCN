$(document).ready(function(){
    $('#run7').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_kine.php",
            data:{
                    token_datos_al_kine:$("#run7").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosDPK = jQuery.parseJSON(data);
                    if(data=='{}'){
                        $('#token_id_f').val("N/E");

                            $('#token_run7').val("N/E");




                    }else{
                        $('#token_id_f').val(datosDPK.id_alumno);

                        $('#token_run7').val(datosDPK.run_alumno);



 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
