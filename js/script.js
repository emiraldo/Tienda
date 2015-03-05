function DescripcionJuego(IdJuego){
	$.ajax({
		url:"VerJuego.php",
		type:"get",
		data:{ID: IdJuego},
		dataType:"json",
		success:function(data){
			
		}
	});
	window.location.href = "VerJuego.php?ID="+IdJuego+""
}

function Alquilar(IdJuego , User, precio){
	var tiempo=$("#tiempo").val()
	var total =  parseFloat(tiempo) * parseFloat(precio)
	$.ajax({
		url:"../Controladores/Controller_Prestamo.php",
		type:"post",
		data:{JUEGO: IdJuego, USER: User, TIEMPO:tiempo , PAGO: total },
		dataType:"json",
		success:function(data){
			
		}
	});
	alert("Se ha alquilado el juego por "+tiempo+" día(s), costo= "+total)
	var tiempo=$("#tiempo").val("")
	window.location.href = "Inicio.php"
}

function CrearJuego(){
	var categoria = $("#categoria1").val()
	var nombre= $("#nombre").val()
	var descripcion= $("#descripcion").val()
	var precio= $("#precio").val()
	var cantidad= $("#cantidad").val()
	var plataforma= $("#plataforma").val()
	var imagen= $("#imagen").val()
	var video= $("#video").val()
	$.ajax({
		url:"../Controladores/Controller_Juegos.php",
		type:"post",
		data:{NOMBRE: nombre, DESCRIPCION: descripcion, PRECIO: precio , CANTIDAD: cantidad, PLATAFORMA: plataforma, IMAGEN: imagen, VIDEO: video, CATEGORIA: categoria },
		dataType:"json",
		success:function(data){
			alert("datos  enviados")
		}
	});
}