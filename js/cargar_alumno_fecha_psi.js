$(document).ready(function(){
    $('#run_alum7').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_agendamiento_psi.php",
            data:{
                    token_datos_al_psi:$("#run_alum7").val()
                    
            },
            success:function(data){
                          // alert(data);
                    datosDPP = jQuery.parseJSON(data);
                    if(data=='{}'){
                        $('#token_id_el').val("N/E");

                            $('#token_alum7').val("N/E");



                    }else{
                        $('#token_id_el').val(datosDPP.id_alumno);

                        $('#token_alum7').val(datosDPP.run_alumno);


                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
