
window.addEventListener('DOMContentLoaded', (event) => {
	let searchButton1 = document.getElementById("lookupCount");
	searchButton1.addEventListener('click', loadXMLDoc1);
	let searchButton2 = document.getElementById("lookupCit");
	searchButton2.addEventListener('click', loadXMLDoc2);
})

function loadXMLDoc1() {
	let country = useless();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var result = this.responseText;
			alert(this.responseText);
			document.getElementById("result").innerHTML = result;
		}
	};
	xhttp.open("GET", "./world.php"+"?"+"country="+country+"&context=nul", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
	xhttp.send(null);
 }
 
 function loadXMLDoc2() {
	let country = useless();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var result = this.responseText;
			alert(this.responseText);
			document.getElementById("result").innerHTML = result;
		}
	};
	xhttp.open("GET", "./world.php"+"?"+"country="+country+"&context=cities", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
	xhttp.send(null);
 }

function useless() {
 	let place = document.getElementById("country").value;
	place = place.trim();
	//return place.charAt(0).toUpperCase() + place.slice(1);
	return place.replace(/\w\S*/g, function(txt) {
		return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }
        );
}

