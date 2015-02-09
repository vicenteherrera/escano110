		function saveSignatureCallback(signatureB64) {
			MiniApplet.saveDataToFile(
					signatureB64,
					"Guardar firma electr\u00F3nica",
					null,
					null,
					null);
		}
		
		function showLogCallback(errorType, errorMessage) {
			showLog("Type: " + errorType + "\nMessage: " + errorMessage);
		}
	
		function doSign() {
			try {
				var data = document.getElementById("data").value;
				
				MiniApplet.sign(
					(data != undefined && data != null && data != "") ? data : null,
					document.getElementById("algorithm").value,
					document.getElementById("format").value,
					document.getElementById("params").value,
					saveSignatureCallback,
					showLogCallback);
			
			} catch(e) {
				try {
					showLog("Type: " + MiniApplet.getErrorType() + "\nMessage: " + MiniApplet.getErrorMessage());
				} catch(ex) {
					showLog("Error: " + e);
				}
			}
		}
		
		function doCoSign() {
			try {
				var signature = document.getElementById("signature").value;
				var data = document.getElementById("data").value;
				
				MiniApplet.coSign(
					(signature != undefined && signature != null && signature != "") ? signature : null,
					(data != undefined && data != null && data != "") ? data : null,
					document.getElementById("algorithm").value,
					document.getElementById("format").value,
					document.getElementById("params").value,
					saveSignatureCallback,
					showLogCallback);

			} catch(e) {
				showLog("Type: " + MiniApplet.getErrorType() + "\nMessage: " + MiniApplet.getErrorMessage());
			}
		}
		
		function doCounterSign() {
			try {
				var signature = document.getElementById("signature").value;
				
				MiniApplet.counterSign(
					(signature != undefined && signature != null && signature != "") ? signature : null,
					document.getElementById("algorithm").value,
					document.getElementById("format").value,
					document.getElementById("params").value,
					saveSignatureCallback,
					showLogCallback);
			} catch(e) {
				showLog("Type: " + MiniApplet.getErrorType() + "\nMessage: " + MiniApplet.getErrorMessage());
			}
		}
		
		/**
		 * Funcion para la carga de un fichero. Almacena el contenido del fichero en un campo oculto y muestra su nombre.
		 * LA CARGA INDEPENDIENTE DE FICHEROS DEBE EVITARSE EN LA MEDIDA DE LO POSIBLE. Si deseas firmar, cofirmar o contrafirmar
		 * un fichero, llama al metodo correspondiente (sign(), coSign() o counterSign()) sin indicar los datos.
		 * El uso del metodo de carga no sera compatible con el Cliente movil.
		 */
		function browse(title, dataField, textDiv) {
			try {
				var filenameDataB64 = MiniApplet.getFileNameContentBase64(title, null, null);
				if (filenameDataB64 == null) {
					return;
				}

				var dataB64;
				var separatorIdx = filenameDataB64.indexOf("|");
				if ((separatorIdx + 1) < filenameDataB64.length) {
					textDiv.innerHTML = filenameDataB64.substring(0, separatorIdx);
					dataField.value = filenameDataB64.substring(separatorIdx + 1);
				} else {
					// El fichero no contenia datos
					return;
				}
			} catch(e) {
				showLog("Type: " + MiniApplet.getErrorType() + "\nMessage: " + MiniApplet.getErrorMessage());
			}
		}
		
		function cleanDataField(dataField, textDiv) {
			textDiv.innerHTML = "";
			dataField.value = null;
		}
		
		function addExtraParam(extraParam) {
			var paramsList = document.getElementById("params");
			paramsList.value = paramsList.value + extraParam + "\n";
			document.getElementById('newParam').value = "";
		}
		
		function cleanExtraParams() {
			document.getElementById("params").value = "";
			document.getElementById('newParam').value = "";
		}
		
		function showLog(newLog) {
			document.getElementById('console').value = document.getElementById('console').value + "\n" + newLog;
		}