$(document).ready(function(){
    $('#run_al').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_alumno_der.php",
            data:{
                    token_alumno:$("#run_al").val()
                    
            },
            success:function(data){
                         //  alert(data);
                    datosAL = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_alumno1').val("N/E");
                            $('#token_alumno2').val("N/E");
                            $('#token_alumno3').val("N/E");
                            $('#token_alumno4').val("N/E");
                            $('#token_alumno6').val("N/E");
                            $('#token_alumno5').val("N/E");
                            $('#token_alumno7').val("N/E");



                    }else{
                        $('#token_alumno1').val(datosAL.id_alumno);
                        $('#token_alumno2').val(datosAL.run_alumno);
                        $('#token_alumno3').val(datosAL.nom_alumno);
                        $('#token_alumno4').val(datosAL.edad);
                        $('#token_alumno6').val(datosAL.telefono);
                        $('#token_alumno5').val(datosAL.fecha_nac);
                        $('#token_alumno7').val(datosAL.direccion_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
