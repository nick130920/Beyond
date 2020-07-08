var nombre = document.getElementById('Usuario');
var email = document.getElementById('email');
var password = document.getElementById('password');
var password2 = document.getElementById('password2');

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
		else{
			acceder();
		}
	}
	return false;
}

function acceder(){
	window.location.href = '../Profesor/indexProfesor.html';
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
		window.location.href = '../Sesion/registro2.html';
	}

	return false;
}

// Validar Nueva Clase
var nombreClase = document.getElementById('nombreClase');
var	descripcion = document.getElementById('descripcionClase');

var pulsado = false;
jornada = document.getElementsByName('jornada');

	function validarClaseNueva(){
		if (nombreClase.value === '' || descripcion.value === ''){
			alertify.set('notifier','position', 'top-right');
			alertify.notify ("Todos los campos son necesarios",'error', 5, function(){});
			return false;
		}
		else{
			for(var i=0;i < jornada.length;i++){
				if(jornada[i].checked){
					pulsado = true;
					break;
				}
			}
			if (!pulsado) {
				alertify.set('notifier','position', 'top-right');
				alertify.notify ("No a seleccionado la jornada",'error', 5, function(){});
				return false;
			}
			else{
				Swal.fire(
					'Clase creada con exito',
  					'Click para continuar',
  					'success')
			}
		}
	}