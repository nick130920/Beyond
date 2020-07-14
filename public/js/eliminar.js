var eliminar = document.getElementById('eliminar');
var editar = document.getElementById('editar');
var cancelar = document.getElementById('cancelar');
var confirmar = document.getElementById('confirmar');
var botonCancelar = document.getElementById('botonCancelar');

var mensajeConfirmacion = document.getElementById('mensajeConfirmacion');
var contentMensaje = document.getElementById('contentMensaje');
var overlayEditar = document.getElementById('overlayEditar');


eliminar.addEventListener('click',function(){
	mensajeConfirmacion.classList.add('active');
	contentMensaje.classList.add('active');
});

editar.addEventListener('click', function(){
	overlayEditar.classList.add('active');
});
botonCancelar.addEventListener('click', function(){
	overlayEditar.classList.remove('active');
});

cancelar.addEventListener('click', function(){
	mensajeConfirmacion.classList.remove('active');
	contentMensaje.classList.remove('active');
});

confirmar.addEventListener('click', function() {
	mensajeConfirmacion.classList.remove('active');
	contentMensaje.classList.remove('active');
	alertify.set('notifier','position', 'top-right');
    alertify.notify ("Clase eliminada con exito.",'success', 5, function(){});
});