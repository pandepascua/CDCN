$(document).ready(function(){
    $('#run').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_masoterapia.php",
            data:{
                    token_masoterapia:$("#run").val()

                    
            },
            success:function(data){
                          // alert(data);
                    datosDPA = jQuery.parseJSON(data);
                       if(data=='{}'){
                        $('#id_masoterapia').val("N/E"); 
                        $('#run').val("N/E"); 
                        $('#Heridas').val("N/E"); 
                        $('#Hematoma').val("N/E"); 
                        $('#Hongos').val("N/E"); 
                        $('#Cicatríz').val("N/E"); 
                        $('#Lunar').val("N/E"); 
                        $('#Dolor').val("N/E"); 
                        $('#Observaciones').val("N/E"); 
                        $('#Fecha').val("N/E"); 
                        $('#sesión').val("N/E"); 
                        $('#comentario').val("N/E"); 

                        

                    }else{
                        $('#id_masoterapia').val(datosDPA.id_masoterapia); 
                        $('#run').val(datosDPA.run); 
                        $('#Heridas').val(datosDPA.Heridas); 
                        $('#Hematoma').val(datosDPA.Hematoma); 
                        $('#Hongos').val(datosDPA.Hongos);
                        $('#Cicatríz').val(datosDPA.Cicatríz);
                        $('#Lunar').val(datosDPA.Lunar);
                        $('#Dolor').val(datosDPA.Dolor);
                        $('#Observaciones').val(datosDPA.Observaciones);
                        $('#Fecha').val(datosDPA.Fecha); 
                        $('#sesión').val(datosDPA.sesión);
                        $('#comentario').val(datosDPA.comentario);
                    }

            },
            error:function(){
                            
                    }
            });  
    });
});

