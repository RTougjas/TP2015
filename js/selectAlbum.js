$(document).on('click', '.dropdown-menu li a', function () {

	document.getElementById("selected_album").innerHTML = $(this).text();

});