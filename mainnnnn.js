$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
         "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Contratar</button></div></div>"  
       }],
        
       //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "Nenhum registro foi encontrado",
            "info": "Mostrando registros de _START_ a _END_ de um total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros de 0 a 0 de um total de 0 registros",
            "infoFiltered": "(filtrado de um total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sLast":"Último",
                "sNext":"Siguinte",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
$("#btnNuevo").click(function(){
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Persona");            
    $("#modalCRUD").modal("show");        
    id_servico1=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
   
   
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id_servico1 = parseInt(fila.find('td:eq(0)').text());
	nome = fila.find('td:eq(1)').text();
	servico_oferecido = fila.find('td:eq(2)').text();
    categoria_servico_oferecido = fila.find('td:eq(3)').text();
	servico_desejado = fila.find('td:eq(4)').text();
	cidade = fila.find('td:eq(5)').text();
	estado = fila.find('td:eq(6)').text();
    id_servico2 = fila.find('td:eq(7)').text();
    id_usuario1 = fila.find('td:eq(8)').text();
	id_usuario2 = fila.find('td:eq(9)').text();
	
	
	$("#id_servico1").val(id_servico1);
	$("#nome").val(nome);
	$("#servico_oferecido").val(servico_oferecido);
	$("#categoria_servico_oferecido").val(categoria_servico_oferecido);
	$("#servico_desejado").val(servico_desejado);
	$("#cidade").val(cidade);
	$("#estado").val(estado);
	$("#id_servico2").val(id_servico2);
    $("#id_usuario1").val(id_usuario1);
    $("#id_usuario2").val(id_usuario2);
  
   
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");            
    $("#modalCRUD").modal("show");  
    
});


//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id_servico1 = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("Deseja contratar Estte Serviço? "+id_servico1+"?");
    if(respuesta){
        $.ajax({
            url: "cruddddd.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id_servico1:id_servico1},
            success: function(){
                tablaPersonas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    id_servico1 = $.trim($("#id_servico1").val());
	nome = $.trim($("#nome").val());
	servico_oferecido = $.trim($("#servico_oferecido").val());
    categoria_servico_oferecido = $.trim($("#categoria_servico_oferecido").val());
	servico_desejado = $.trim($("#servico_desejado").val());
	cidade = $.trim($("#cidade").val());
	estado = $.trim($("#estado").val());
	id_servico2 = $.trim($("#id_servico2").val());
	id_usuario1 = $.trim($("#id_usuario1").val());
	id_usuario2 = $.trim($("#id_usuario2").val());
    
    $.ajax({
        url: "cruddddd.php",
        type: "POST",
        dataType: "json",
        data: {id_servico1:id_servico1, nome:nome, servico_oferecido:servico_oferecido, categoria_servico_oferecido:categoria_servico_oferecido, servico_desejado:servico_desejado, cidade:cidade, estado:estado, id_servico2:id_servico2, id_usuario1:id_usuario1, id_usuario2:id_usuario2, opcion:opcion},
        success: function(data){  
            console.log(data);
            id_servico1 = data[0].id_servico1;     
			nome = data[0].nome;     
            servico_oferecido = data[0].servico_oferecido;
            categoria_servico_oferecido = data[0].categoria_servico_oferecido;
			servico_desejado = data[0].servico_desejado;
			id_cidade = data[0].cidade; 
			id_estado = data[0].estado; 
            id_servico2 = data[0].id_servico2; 
			id_usuario1 = data[0].id_usuario1; 
			id_usuario2 = data[0].id_usuario2; 

 
            if(opcion == 1){tablaPersonas.row.add([id_servico1,nome,servico_oferecido,categoria_servico_oferecido,categoria_servico_oferecido,cidade,estado,id_servico2,id_servico2,id_usuario1,id_usuario2]).draw();}
            else{tablaPersonas.row(fila).data([id_servico1,nome,servico_oferecido,categoria_servico_oferecido,categoria_servico_oferecido,cidade,estado,id_servico2,id_servico2,id_usuario1,id_usuario2]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});