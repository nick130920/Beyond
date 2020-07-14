var overlay = document.getElementById('overlay');
var	popup = document.getElementById('popup');
var	btnCerrar = document.getElementById('btn-cerrar');
	

	window.onload = function añadirClase(){
		overlay.classList.add('active');
		popup.classList.add('active');
		setInterval(borrar,2500);
		setInterval(borrar2,3300);
	}
function borrar(){
		overlay.classList.remove('active');
		popup.classList.remove('active');
}
function borrar2(){
	overlay.classList.add('inactive');
}

//------------------------- Segundo overlay

var botonOverlay2 = document.getElementById('botonOverlay2');
var overlay2 = document.getElementById('overlay2');
var cancelarOverlay2 = document.getElementById('cancelarOverlay2')

botonOverlay2.addEventListener('click', function(){
	overlay2.classList.add('active');
});
cancelarOverlay2.addEventListener('click', function(){
	overlay2.classList.remove('active');
})