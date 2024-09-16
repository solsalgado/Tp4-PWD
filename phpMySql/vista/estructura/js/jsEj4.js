$("#formPatente").validate({
    rules:{
        patente:{
            required: true,
            minlength: 7,
            maxlength: 7,
            alfanumerico: true,
        }
    },
    messages: {
        patente: {
          required: "Por favor ingrese una patente.",
          minlength: "Debe tener como minimo 7 caracteres.",
          maxlength: "Debe tener como maximo 7 caracteres.",
        }

    },

    errorPlacement: function(error, element) {

        if (element.attr("name")=== "patente") {
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