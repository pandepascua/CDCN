var numeroFila = 0;

$(document).ready(function(){
        $("#agregar4").on('click', funcionAgregar4);


});



function funcionAgregar4(){
    ++numeroFila;

    $("#tabla_ant_far").append(
            $('<tr>')
                    .prop('id', 'fila_' + numeroFila)
                    .append(
                    $('<td>')
                            .append(
                                    $('<input>')
                                            .attr('type','text')
                                            .attr('placeholder','Ingrese datos')
                                            .attr('name','medicamento[]')
                                            .prop('id', 'token_' + numeroFila)
                                            .attr('data-id', numeroFila)
                                            .attr('onfocusout', 'buscarDatos(this.id)')
                                            .prop('class','input_equipo')

                            )
                            .append(
                                    $('<input>')
                                            .attr('type','hidden')
                                            .attr('name','idactivo[]')
                                            .prop('id', 'hf_token_token_' + numeroFila)
                                            .attr('class','input_equipo')
                            )
             )
                    .append(
                    $('<td>')
                            .append(
                                    $('<span>')
                                            .prop('name', 'dosis' + numeroFila)
                                            .prop('id', 'año_' + numeroFila)

                            )
                            .append(
                                    $('<input>')
                                            .attr('placeholder','Ingrese datos')
                                            .attr('type','text')
                                            .attr('name','dosis[]')
                                            .prop('id', 'dosis_' + numeroFila)
                            )
                    
                    )
                   
                    .append(
                    $('<td>')
                            .append(
                                    $('<input>')
                                            .attr('type','button')
                                            .attr('onclick','remove(this)')
                                            .attr('value','Eliminar')
                                            .attr('style','width:139px')
                                            .prop('id', 'token_' + numeroFila)

                    )
            )
    )
}
