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