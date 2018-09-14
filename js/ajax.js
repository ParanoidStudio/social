window.onload = function () {
	document.querySelector('#signup').onclick = function() {
		ajaxPost();
	}
}

function ajaxPost() {
	var request = new XMLHttpRequest();
	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('#load_div').innerHTML = request.responseText;
		}
	}
	request.open( 'POST', 'valid.php');
	request.send();
}