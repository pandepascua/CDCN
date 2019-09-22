var numeroFila = 0;

$(document).ready(function(){
        $("#agregar3").on('click', funcionAgregar3);


});



function funcionAgregar3(){
    ++numeroFila;

    $("#tabla_ant_ant").append(
            $('<tr>')
                    .prop('id', 'fila_' + numeroFila)
                    .append(
                    $('<td>')
                            .append(
                                    $('<input>')
                                            .attr('type','text')
                                            .attr('placeholder','Ingrese número')
                                            .attr('name','descripcion[]')
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
                                            .prop('name', 'año_ant' + numeroFila)
                                            .prop('id', 'año_' + numeroFila)

                            )
                            .append(
                                    $('<input>')
                                            .attr('type','text')
                                            .attr('name','año_ant[]')
                                            .prop('id', 'año_' + numeroFila)
                            )
                    
                    )
                    .append(
                    $('<td>')
                            .append(
                                    $('<span>')
                                            .prop('id', 'nombre_marca_token_' + numeroFila)

                    )
                    .append(
                            $('<input>')
                                    .attr('type','text')
                                    .attr('name','estado[]')
                                    .prop('id', 'hf_token_' + numeroFila)
                                    .prop('id', 'nombre2_marca_token_' + numeroFila)

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
