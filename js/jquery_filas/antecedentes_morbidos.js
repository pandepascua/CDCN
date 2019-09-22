var numeroFila = 0;

$(document).ready(function(){
        $("#agregar").on('click', funcionAgregar);


});



function funcionAgregar(){
    ++numeroFila;

    $("#tabla_ant_mor").append(
            $('<tr>')
                    .prop('id', 'fila_' + numeroFila)
                    .append(
                    $('<td>')
                            .append(
                                    $('<input>')
                                            .attr('type','text')
                                            .attr('placeholder','Ingrese datos')
                                            .attr('name','enfermedad[]')
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
                                            .prop('name', 'año_mor' + numeroFila)
                                            .prop('id', 'año_' + numeroFila)

                            )
                            .append(
                                    $('<input>')
                                    .attr('title','Ingrese el año')
                                            .attr('placeholder','Ingrese datos')
                                            .attr('type','text')
                                            .attr('name','año[]')
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
                                    .attr('placeholder','Ingrese datos')
                                    .attr('title','Ingrese datos de control')

                                    .attr('type','text')
                                    .attr('name','control[]')
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
