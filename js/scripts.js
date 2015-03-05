jQuery(document).ready(function($) {
	  //validar formulario alta 
		$('form[id^="alta_"]').submit(function(event) {
		//validar campos vacíos
			var no_vacios = true;
			
			$('input[type="text"]').each(function() {
					if(jQuery.trim($(this).val()) == '') {
						$(this).next().text('* obligatorio');
						no_vacios = false;
					} else {
						$(this).next().text('');
					}
			});
			
			//mail 
			var email_valido = true;	//por si no existe el campo
			var email = $('#email');
			if (email != undefined && jQuery.trim(email.val()) != '') {
				//validar
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				if (!reg.test(email.val())) {
					email_valido = false;
					email.next().text('email incorrecto');
				}	
				email.next().text();
			}
			
			//cp
			var cp_ok = true;
			var cp = $('#cp');
			if (cp != undefined && jQuery.trim(cp.val()) != '') {
				//validar reg exp
				var regexp = /^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$/;
				if (!regexp.test(cp.val())) {
					cp_ok = false;
					cp.next().text('CP incorrecto');
				}
				cp.next().text();
			}
			
			if(no_vacios && email_valido && cp_ok) {
				return true;
			} else {
				return false;
			}

		});
});