$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
         "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Avaliar</button></div></div>"  
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
	id_escambo_swop = fila.find('td:eq(1)').text();
	nome = fila.find('td:eq(2)').text();
    servico_oferecido = fila.find('td:eq(3)').text();
	data_entrega_servico1 = fila.find('td:eq(4)').text();
    email = fila.find('td:eq(5)').text();
	telefone = fila.find('td:eq(6)').text();
	servico_desejado = fila.find('td:eq(7)').text();
	data_entrega_servico2 = fila.find('td:eq(8)').text();
	feedback_servico1 = fila.find('td:eq(9)').text();
	nota_servico_prestado = fila.find('td:eq(10)').text();
    id_servico2 = fila.find('td:eq(11)').text();
    id_usuario1 = fila.find('td:eq(12)').text();
	id_usuario2 = fila.find('td:eq(13)').text();
	
	
	$("#id_escambo_swop").val(id_escambo_swop);
	$("#nome").val(nome);
	$("#servico_oferecido").val(servico_oferecido);
	$("#data_entrega_servico1").val(data_entrega_servico1);
	$("#email").val(email);
	$("#telefone").val(telefone);
	$("#servico_desejado").val(servico_desejado);
	$("#data_entrega_servico2").val(data_entrega_servico2);
	$("#feedback_servico1").val(feedback_servico1);
	$("#nota_servico_prestado").val(nota_servico_prestado);
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


	id_escambo_swop = $.trim($("#id_escambo_swop").val());
	nome = $.trim($("#nome").val());
	servico_oferecido = $.trim($("#servico_oferecido").val());
    data_entrega_servico1 = $.trim($("#data_entrega_servico1").val());
	email = $.trim($("#email").val());
	telefone = $.trim($("#telefone").val());
	servico_desejado = $.trim($("#servico_desejado").val());
	data_entrega_servico2 = $.trim($("#data_entrega_servico2").val());
	feedback_servico1 = $.trim($("#feedback_servico1").val());
	nota_servico_prestado = $.trim($("#nota_servico_prestado").val());
	id_servico2 = $.trim($("#id_servico2").val());
	id_usuario1 = $.trim($("#id_usuario1").val());
	id_usuario2 = $.trim($("#id_usuario2").val());
    
    $.ajax({
        url: "cruddddd.php",
        type: "POST",
        dataType: "json",
        data: {id_escambo_swop:id_escambo_swop, nome:nome, servico_oferecido:servico_oferecido, data_entrega_servico1:data_entrega_servico1, email:email, telefone:telefone, servico_desejado:servico_desejado, data_entrega_servico2:data_entrega_servico2, feedback_servico1:feedback_servico1, nota_servico_prestado:nota_servico_prestado, id_servico2:id_servico2, id_usuario1:id_usuario1, id_usuario2:id_usuario2, opcion:opcion},
        success: function(data){  
            console.log(data); 
			id_servico1 = data[0].id_servico1; 
			id_escambo_swop = data[0].id_escambo_swop;
			nome = data[0].nome;
            servico_oferecido = data[0].servico_oferecido;
            data_entrega_servico1 = data[0].data_entrega_servico1;
			email = data[0].email;
			telefone = data[0].telefone; 
			servico_desejado = data[0].servico_desejado;
			data_entrega_servico2 = data[0].data_entrega_servico2;
			feedback_servico1 = data[0].feedback_servico1;
			nota_servico_prestado = data[0].nota_servico_prestado;  
            id_servico2 = data[0].id_servico2; 
			id_usuario1 = data[0].id_usuario1; 
			id_usuario2 = data[0].id_usuario2; 

 
            if(opcion == 1){tablaPersonas.row.add([id_servico1,id_escambo_swop,nome,servico_oferecido,data_entrega_servico1,email,telefone,servico_desejado,feedback_servico1,nota_servico_prestado,id_servico2,id_usuario1,id_usuario2]).draw();}
            else{tablaPersonas.row(fila).data([id_servico1,id_escambo_swop,nome,servico_oferecido,data_entrega_servico1,email,telefone,servico_desejado,feedback_servico1,nota_servico_prestado,id_servico2,id_usuario1,id_usuario2]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});