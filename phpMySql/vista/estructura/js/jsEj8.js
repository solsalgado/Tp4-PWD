$("#formDuenio").validate({
    rules:{
        patente:{
            required: true,
            minlength: 7,
            maxlength: 7,
            alfanumerico: true,
        },
        DniDuenio:{
            required: true,
            minlength: 8,
            maxlength: 8,
            unicamenteNumeros: true,
        },
        Apellido:{
            required: true,
        },
        Nombre:{
            required: true,
        },
        fechaNac:{
            required: true,
        },
        Telefono:{
            required: true,
            unicamenteNumeros: true,
        },
        Domicilio:{
            required: true,
        },
    },

    messages: {
        patente: {
            required: "Por favor ingrese una patente.",
            minlength: "Debe tener como minimo 7 caracteres.",
            maxlength: "Debe tener como maximo 7 caracteres.",
          
        },
        DniDuenio: {
          required: "Por favor ingrese un DNI.",
          minlength: "Debe tener como minimo 8 caracteres.",
          maxlength: "Debe tener como maximo 8 caracteres.",
        
        },
        Apellido: {
            required: "Por favor ingrese un apellido.",
          
        },
        Nombre: {
            required: "Por favor ingrese un nombre.",
          
        },
        fechaNac: {
            required: "Por favor ingrese una fecha.",
          
        },
        Telefono: {
            required: "Por favor ingrese un teléfono.",
            unicamenteNumeros: "El teléfono solo debe contener números."
        },
        Domicilio: {
            required: "Por favor ingrese un domicilio.",
          
        }

    },

    errorPlacement: function(error, element) {

        var name = element.attr("name");

        if (name === "patente") {
            error.appendTo("#error-patente");
        } else if (name === "DniDuenio") {
            error.appendTo("#error-dni");
        } else if (name === "Apellido") {
            error.appendTo("#error-apellido");
        } else if (name === "Nombre") {
            error.appendTo("#error-nombre");
        } else if (name === "fechaNac") {
            error.appendTo("#error-fecha");
        } else if (name === "Telefono") {
            error.appendTo("#error-telefono");
        } else if (name === "Domicilio") {
            error.appendTo("#error-domicilio");
        } else {
            error.insertAfter(element); // Para otros campos no especificados.
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

$.validator.addMethod("unicamenteNumeros", function (value, element) {
  return /^\d+$/.test(value);
}, "El DNI solo debe contener números.");

$.validator.addMethod("alfanumerico", function (value, element) {
    return /[a-zA-Z]/.test(value) && /\d/.test(value);
  }, "La patente debe contener números y letras.");