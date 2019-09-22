$(document).ready(function(){
    $('#id_user').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_carga_user.php",
            data:{
                    token_user:$("#id_user").val()

                    
            },
            success:function(data){
                           //alert(data);
                    datosDPA = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_id').val("N/E");
                            $('#token_nombre').val("N/E");
                             $('#token_apellido').val("N/E");
                            $('#token_usuario').val("N/E");
                            $('#token_password').val("N/E");
                            $('#id_perfil').val("N/E");
               

                    }else{
                        $('#token_id').val(datosDPA.id_usuario);
                        $('#token_nombre').val(datosDPA.nombre);
                            $('#token_apellido').val(datosDPA.apellido);
                            $('#token_usuario').val(datosDPA.nombre_usuario);
                             $('#token_password').val(datosDPA.password);
                            $('#id_perfil').val(datosDPA.id_perfil);
               

                           
                           
 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
