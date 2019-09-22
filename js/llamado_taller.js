$(document).ready(function(){
    $('#nom_taller').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/buscar_token_taller.php",
            data:{
                    tokenT:$("#nom_taller").val()
                    
            },
            success:function(data){
                          // alert(data);
                    datosT = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_taller').val("N/E");


  

                    }else{

                            $('#token_taller').val(datosT.id_taller);

 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
