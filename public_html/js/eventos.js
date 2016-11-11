$("document").ready(function(){
	//Enviar Comentario
	$("#formComment").on("submit",function(event){
		event.preventDefault();
		var datos = {
			'publication_id' : $("#publication_id").val(),
			'name' : $("#name").val(),
			'comment' : $("#comment").val()
		}

		$.ajax({
			'url' : 'comment/send',
			'type' : 'get',
			'data' : datos,
			beforeSend : function(){
				$("#comment").val('');
			},
			success : function(data){
				updateComments(data);
				//$("#spaceComments .comments:nth-child(1)").css('font-size','0px');
				//mostrarUltimo();
			}
		});
	});

	//Actualizar Comentarios
	iniciarTimer();
	function iniciarTimer(){
		var timer = setTimeout(function(){
			$.ajax({
				'url' : 'comment/update/'+$("#publication_id").val(),
				'type' : 'get',
				success : function(data){
					updateComments(data);
				}
			});
			clearTimeout(timer);
			iniciarTimer();
		},1000);
	}

});


function updateComments(data){

	var html = '';
	for(x=0;x<data.length;x++){
		
		html += '<div class="comments"><p><strong>Fecha:</strong> <small>'+data[x].created_at+'</small></p><p><strong>'+data[x].name+' dice:</strong> '+data[x].comment+'</p></div>';
	}
	
	$("#spaceComments").html(html);
}
