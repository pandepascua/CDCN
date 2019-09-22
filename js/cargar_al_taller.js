$(document).ready(function(){
    $('#run_alumno1').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_alumno.php",
            data:{
                    token_alumno:$("#run_alumno1").val()
                    
            },
            success:function(data){
                          // alert(data);
                    datosAL = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_alumno1').val("N/E");



                    }else{
                        $('#token_alumno1').val(datosAL.id_alumno);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
