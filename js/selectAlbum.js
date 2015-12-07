$(document).on('click', '.dropdown-menu li a', function () {

	document.getElementById("selected_album").innerHTML = $(this).text();

});

function selectAlbum() {
	
	var album_id = event.target.value;
	
	var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	    if (xhttp.readyState == 4 && xhttp.status == 200) {
	      document.getElementById("selected_album").innerHTML = xhttp.responseText;
	    }
	  };
	  if(album_id != "new_album") {
		  //window.location.assign("gallery/albumDetails/" + album_id);
		  xhttp.open("GET", "gallery/albumDetails/" + album_id, true);
		  xhttp.send();
	  }
	  else {
		  window.location.assign("gallery/create_album");

	  }
}