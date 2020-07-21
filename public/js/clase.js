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

// ----------------------- Tema ---------------------------------
var crearTema = document.getElementById('crearTema');
var overlayTema = document.getElementById('overlayTema');
var cancelarTema = document.getElementById('cancelarTema');

crearTema.addEventListener('click', function(){
	overlayTema.classList.add('active');
});
cancelarTema.addEventListener('click', function(){
	overlayTema.classList.remove('active');
});