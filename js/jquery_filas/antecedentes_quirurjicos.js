var numeroFila = 0;

$(document).ready(function(){
        $("#agregar2").on('click', funcionAgregar2);


});



function funcionAgregar2(){
    ++numeroFila;

    $("#tabla_ant_quir").append(
            $('<tr>')
                    .prop('id', 'fila_' + numeroFila)
                    .append(
                    $('<td>')
                            .append(
                                    $('<input>')
                                            .attr('type','text')
                                            .attr('placeholder','Ingrese número')
                                            .attr('name','cirujia[]')
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
                                            .prop('name', 'año_quir' + numeroFila)
                                            .prop('id', 'año_' + numeroFila)

                            )
                            .append(
                                    $('<input>')
                                            .attr('type','text')
                                            .attr('name','año_q[]')
                                            .prop('id', 'año_' + numeroFila)
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
