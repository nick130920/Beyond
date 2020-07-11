var eliminar = document.getElementById('eliminar');
var cancelar = document.getElementById('cancelar');
var confirmar = document.getElementById('confirmar');

var mensajeConfirmacion = document.getElementById('mensajeConfirmacion');


eliminar.addEventListener('click',function(){
	mensajeConfirmacion.classList.add('active');
});

cancelar.addEventListener('click', function(){
	mensajeConfirmacion.classList.remove('active');
})

confirmar.addEventListener('click', function() {
	mensajeConfirmacion.classList.remove('active');
	alertify.set('notifier','position', 'top-right');
    alertify.notify ("Clase eliminada con exito.",'success', 5, function(){});
})