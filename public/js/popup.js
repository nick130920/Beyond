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
/////////////////////////////
Dropzone.options.myAwesomeDropzone = {
    paramName: "file", // Las imágenes se van a usar bajo este nombre de parámetro
    maxFilesize: 2 // Tamaño máximo en MB
};
