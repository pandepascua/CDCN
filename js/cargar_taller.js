$(document).ready(function(){
    $('#nom_taller').focusout(function(){
            $.ajax({
            method:"post",
            url:"/cdcn/token_taller.php",
            data:{
                    token_taller:$("#nom_taller").val()
                    
            },
            success:function(data){
                           //alert(data);
                    datosTaller = jQuery.parseJSON(data);
                    if(data=='{}'){

                            $('#token_taller').val("N/E");



                    }else{

                            $('#token_taller').val(datosTaller.id_taller);



 

                    }

            },
            error:function(){
                            
                    }
            });  
    });
});
