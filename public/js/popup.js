var overlay = document.getElementById('overlay');
var	popup = document.getElementById('popup');
var	btnCerrar = document.getElementById('btn-cerrar');
	

	window.onload = function añadirClase(){
		overlay.classList.add('active');
		popup.classList.add('active');
	}

	btnCerrar.addEventListener('click', function(){
		overlay.classList.remove('active');
		popup.classList.remove('active');
	});