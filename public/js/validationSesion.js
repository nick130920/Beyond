var nombre = document.getElementById('email');
var password = document.getElementById('password');

function validarSesion() {
	if (nombre.value === null || nombre.value === '' ) {
		alertify.set('notifier','position', 'top-right');
		alertify.notify ("El Usuario es obligatorio",'error', 2, function(){});
	}
	else if(password.value === null || password.value === '' ){
		alertify.set('notifier','position', 'top-right');
			alertify.notify ("La Contraseña es obligatoria",'error', 2, function(){});
		}
}
