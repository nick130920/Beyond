var correo =document.getElementById('email');
var expresion ;
expresion = /\w+@+\w+\.+\[a-z]/; 

function validarCorreo() {
	var vAcceso = false;
	if (correo.value == null || correo.value == '') {
		alertify.set('notifier','position', 'top-right');
		alertify.notify ("El Correo es obligatorio",'error', 2, function(){});
	}
	else{
			alertify.set('notifier','position', 'top-right');
			alertify.notify ("En breve resivira un correo",'success', 5, function(){window.location.href='login.html'});
	}
	return false;
}