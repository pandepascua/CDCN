$(document).ready(function(){
    $('#run_alumno2').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_alumno.php",
            data:{
                    token_alumno:$("#run_alumno2").val()
                    
            },
            success:function(data){
                          // alert(data);
                    datosAL = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_alumno2').val("N/E");



                    }else{
                        $('#token_alumno2').val(datosAL.id_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
