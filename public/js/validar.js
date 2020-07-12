var nombre = document.getElementById('name');
var email = document.getElementById('email');
var password = document.getElementById('password');
var password2 = document.getElementById('password-confirm');

function validarSesion() {
	if (nombre.value === null || nombre.value === '' ) {
		alertify.set('notifier','position', 'top-right');
		alertify.notify ("El Usuario es obligatorio",'error', 2, function(){});
		return false;
	}
	else{
		if(password.value === null || password.value === '' ){
			alertify.set('notifier','position', 'top-right');
			alertify.notify ("La Contraseña es obligatoria",'error', 2, function(){});
			return false;
		}
	}
	return false;
}
// Registro

function validarRegistro(){
	if (nombre.value === '' || email.value === '' || password.value === '' || password2.value === '') {
		alertify.set('notifier','position', 'top-right');
		alertify.notify ("Todos los campos son necesarios",'error', 2, function(){});
		return false;
	}
	else if (password.value != password2.value) {
		alertify.set('notifier','position', 'top-right');
		alertify.notify ("La Contraseña no es la misma",'error', 2, function(){});
		return false;
	}
	else{
		document.getElementById('ocultar').style.display = 'none';
		document.getElementById('visible').style.display = 'block';
	}

	return false;
}

// Validar Nueva Clase
var nombreClase = document.getElementById('nameClass');
var	descripcion = document.getElementById('descriptionClass');

var pulsado = false;
jornada = document.getElementsByName('jornada');

	function validarClaseNueva(){
		if (nombreClase.value === '' || descripcion.value === ''){
			alertify.set('notifier','position', 'top-right');
			alertify.notify ("Todos los campos son necesarios",'error', 5, function(){});
			return false;
		}
		else{
			Swal.fire(
				'Clase creada con exito',
				'Click para continuar',
				'success')
		}
	}
