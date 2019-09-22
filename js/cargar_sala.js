$(document).ready(function(){
    $('#nom_sala').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_sala.php",
            data:{
                    token_sala:$("#nom_sala").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosSala = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_sala').val("N/E");



                    }else{

                            $('#token_sala').val(datosSala.id_sala);



 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
