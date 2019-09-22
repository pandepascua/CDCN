$(document).ready(function(){
    $('#run').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_al_ter.php",
            data:{
                token_al_ter:$("#run").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosAL = jQuery.parseJSON(data);
                    if(data=='{}'){
                        
                        $('#token_alumno0').val("N/E");
                            $('#token_alumno1').val("N/E");
                            $('#token_alumno2').val("N/E");
                            $('#token_alumno3').val("N/E");
                            $('#token_alumno4').val("N/E");
                            $('#token_alumno5').val("N/E");
                          



                    }else{
                        $('#token_alumno0').val(datosAL.id_alumno);
                        $('#token_alumno1').val(datosAL.run_alumno);
                        $('#token_alumno2').val(datosAL.nom_alumno);
                        $('#token_alumno3').val(datosAL.edad);
                        $('#token_alumno4').val(datosAL.telefono);
                        $('#token_alumno5').val(datosAL.fecha_nac);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
