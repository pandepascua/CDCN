$(document).ready(function(){
    $('#nom_prof').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_profesional.php",
            data:{
                    token_datos_profesional:$("#nom_prof").val()
                    
            },
            success:function(data){
                          // alert(data);
                    datosProf = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_profesional').val("N/E");



                    }else{

                            $('#token_profesional').val(datosProf.id_profesional);



 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
