function selectedAlbum(albumID) {
	var xhttp;
	
	if(albumID == "") {
		document.getElementById("selected_album").innerHTML = "";
		    return;
	}
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (xhttp.readyState == 4 && xhttp.status == 200) {
	      document.getElementById("selected_album").innerHTML = xhttp.responseText;
	    }
	};
	xhttp.open("POST", "lammas.txt", true);
	xhttp.send();
}