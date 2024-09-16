$("#formBuscarPersona").validate({
    rules:{
        NroDni:{
            required: true,
            unicamenteNumeros: true,
            minlength: 8,
            maxlength: 8,
        }
    },
    messages: {
        NroDni: {
          required: "Por favor ingrese un DNI.",
          minlength: "El DNI debe ser de minimo 8 numeros.",
          maxlength: "El DNI debe ser de maximo 8 numeros.",
        }

    },

    errorPlacement: function(error, element) {

        if (element.attr("name")=== "NroDni") {
            error.appendTo("#mensaje-error");
        } else {
            error.insertAfter(element)
        }
    },
      
    
    submitHandler: function(form) {
      form.submit();
    }
});

//Validacion personalizada: contraseña diferente al usuario
/*
$.validator.addMethod("contraseñaDiferente", function (value, element) {
    return value !== $("#usuario").val();
}, "La contraseña debe ser distinta al nombre de usuario.");
*/
//Validacion personalizada: contraseña con numeros y letras

$.validator.addMethod("alfanumerico", function (value, element) {
  return /[a-zA-Z]/.test(value) && /\d/.test(value);
}, "La patente debe contener números y letras.");

$.validator.addMethod("unicamenteNumeros", function (value, element) {
    return /^\d+$/.test(value);
  }, "El DNI solo debe contener números..");