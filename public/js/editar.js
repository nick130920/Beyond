var editar = document.getElementById('editar');

var overlayEditar = document.getElementById('overlayEditar');

editar.addEventListener('click', function(){
	overlayEditar.classList.add('active');
});
botonCancelar.addEventListener('click', function(){
	overlayEditar.classList.remove('active');
});