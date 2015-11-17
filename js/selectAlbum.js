$(document).on('click', '.dropdown-menu li a', function () {
  	
	//window.alert($(this).text());
	
	//var xhttp;
	document.getElementById("selected_album").innerHTML = document.getElementById('new');
	//document.getElementById("selected_album").innerHTML = $(this).text();

	/*
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (xhttp.readyState == 4 && xhttp.status == 200) {
	      document.getElementById("selected_album").innerHTML = xhttp.responseText;
	    }
	};
	
	var title = $(this).text();
	
	xhttp.open("GET", <?php echo site_url("/lammas")?>, true);
	xhttp.send();
  	*/

});