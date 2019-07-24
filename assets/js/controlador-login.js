$(document).ready(function () {

});

$("#btn-login").click(function () {
	var parametros = "inputEmail=" + $("#inputEmail").val() +
		"&inputPassword=" + $("#inputPassword").val();
	//console.log(parametros);
	$.ajax({
		url: "assets/ajax/acciones_login.php?accion=login",//po quie
		method: "GET",
		data: parametros,
		dataType: 'json	',
		success: function (respuesta) {
			if (respuesta.status == 0) {
				swal("Error", respuesta.mensaje, "error");
			}
			else {
				console.log("Si tiene acceso, sera redireccionado");
				window.location = "perfil.php";
				console.log(respuesta.mensaje);

				/*if(respuesta.codigo_tipo_usuario==1)
					window.location = "pagina_cajero.php"; //Redireccionar a la pagina de cajero
				else if(respuesta.codigo_tipo_usuario==2)
					window.location = "pagina_admin.php";//Redireccionar a la pagina de administrador
			ESTO LO USARE CUANDO SE CONFIGURE EL TIPO DE USUARIO QUE ES, 2DO SPRINT*/
			}
		},
		error: function () {

		}
	});
});	