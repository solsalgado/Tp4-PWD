$("#formAuto").validate({
    rules:{
        patente:{
            required: true,
            minlength: 7,
            maxlength: 7,
            alfanumerico: true,
        },
        marca:{
            required: true,
            
        },
        Modelo:{
            required: true,
            maxlength: 4,
            unicamenteNumeros: true,
        },
        DniDuenio:{
            required: true,
            unicamenteNumeros: true,
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
          unicamenteNumeros: "El DNI solo debe contener números."
        
        },
        marca: {
            required: "Por favor ingrese una marca.",
          
        },
        Modelo: {
            required: "Por favor ingrese un modelo.",
          
        }

    },

    errorPlacement: function(error, element) {

        var name = element.attr("name");

        if (name === "patente") {
            error.appendTo("#error-patente");
        } else if (name === "DniDuenio") {
            error.appendTo("#error-dni");
        } else if (name === "marca") {
            error.appendTo("#error-marca");
        } else if (name === "Modelo") {
            error.appendTo("#error-modelo");
        } else {
            error.insertAfter(element); // Para otros campos no especificados.
        }
      
    },
    submitHandler: function(form) {
      form.submit();
    }
});


//Validacion personalizada: DNI solo con numeros

$.validator.addMethod("unicamenteNumeros", function (value, element) {
  return /^\d+$/.test(value);
}, "El DNI solo debe contener números.");

//Validacion personalizada: patente con numeros y letras
$.validator.addMethod("alfanumerico", function (value, element) {
    return /[a-zA-Z]/.test(value) && /\d/.test(value);
  }, "La patente debe contener números y letras.");