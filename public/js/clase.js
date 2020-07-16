// ------------------------------ Mis Java Script ---------------------------

 var mensaje = document.getElementById('mensaje');
 var enviarTitulo = document.getElementById('enviarTitulo');
 var cancelarEnviar = document.getElementById('cancelarEnviar');
 var nombreArchivo = document.getElementById('nombreArchivo');
 var archivo = document.getElementById('archivo');
 var indicaciones = document.getElementById('indicaciones');

 enviarTitulo.addEventListener('click', function(){
 	mensaje.classList.add('active');
 	indicaciones.classList.add('active');
 });

 cancelarEnviar.addEventListener('click', function(){
 	mensaje.classList.remove('active');
 	indicaciones.classList.remove('active');
 });

 // ----------------------- Editar Clase -------------------------
 var editar = document.getElementById('editar');

var overlayEditar = document.getElementById('overlayEditar');

editar.addEventListener('click', function(){
	overlayEditar.classList.add('active');
});
botonCancelar.addEventListener('click', function(){
	overlayEditar.classList.remove('active');
});