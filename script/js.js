function getTipoProducto() {
	
	if (window.XMLHttpRequest) {
		xmlhttp3 = new XMLHttpRequest();
		} else { 
		xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp3.onreadystatechange=function() {
		if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {
			document.getElementById("tipoProducto").innerHTML=xmlhttp3.responseText;
		}
	}
	xmlhttp3.open("GET","../Presentation/getTypeProduct.php",true);
	xmlhttp3.send();
}



function getProduct(idTypeProduct) {
	
	if (window.XMLHttpRequest) {
		xmlhttp3 = new XMLHttpRequest();
		} else { 
		xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp3.onreadystatechange=function() {
		if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {
			document.getElementById("producto").innerHTML=xmlhttp3.responseText;
		}
	}
	xmlhttp3.open("GET","../Presentation/GetProduct.php?idTypeProduct="+idTypeProduct,true);
	xmlhttp3.send();
}
