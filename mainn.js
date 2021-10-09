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
   
   
//botón CONTRATAR   
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id_servico1 = parseInt(fila.find('td:eq(0)').text());
    servico_oferecido = fila.find('td:eq(1)').text();
    categoria_servico_oferecido = fila.find('td:eq(2)').text();
	nome = fila.find('td:eq(3)').text();
	email = fila.find('td:eq(4)').text();
	telefone = fila.find('td:eq(5)').text();
	cidade = fila.find('td:eq(6)').text();
	estado = fila.find('td:eq(7)').text();
    
    
    $("#servico_oferecido").val(servico_oferecido);
    $("#categoria_servico_oferecido").val(categoria_servico_oferecido);
	$("#nome").val(nome);
	$("#email").val(email);
	$("#telefone").val(telefone);
	$("#cidade").val(cidade);
	$("#estado").val(estado);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");            
    $("#modalCRUD").modal("show");  
    
});


   
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    servico_oferecido = $.trim($("#servico_oferecido").val());
    categoria_servico_oferecido = $.trim($("#categoria_servico_oferecido").val());
	nome = $.trim($("#nome").val());
    cidade = $.trim($("#cidade").val());
	estado = $.trim($("#estado").val());
    
    $.ajax({
        url: "crudd.php",
        type: "POST",
        dataType: "json",
        data: {servico_oferecido:servico_oferecido, categoria_servico_oferecido:categoria_servico_oferecido, nome:nome, email:email, cidade:cidade, estado:estado, opcion:opcion},
        success: function(data){  
            console.log(data);
            id_servico1 = data[0].id_servico1;            
            servico_oferecido = data[0].servico_oferecido;
            categoria_servico_oferecido = data[0].categoria_servico_oferecido;
			nome = data[0].nome;
			emal = data[0].email;
			cidade = data[0].cidade;
			estado = data[0].estado;
            if(opcion == 1){tablaPersonas.row.add([id_servico1,servico_oferecido,categoria_servico_oferecido,nome,email,cidade,estado]).draw();}
            else{tablaPersonas.row(fila).data([id_servico1,servico_oferecido,categoria_servico_oferecido,nome,email,cidade,estado]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});