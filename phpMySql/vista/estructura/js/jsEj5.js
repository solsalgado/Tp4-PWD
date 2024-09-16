$("#formDni").validate({
    rules:{
        dni:{
            required: true,
            minlength: 8,
            maxlength: 8,
            unicamenteNumeros: true,
        }
    },
    messages: {
        dni: {
          required: "Por favor ingrese un DNI.",
          minlength: "Debe tener como minimo 8 caracteres.",
          maxlength: "Debe tener como maximo 8 caracteres.",

        }

    },

    errorPlacement: function(error, element) {

        if (element.attr("name")=== "dni") {
            error.appendTo("#mensaje-error");
        } else {
            error.insertAfter(element)
        }
    },


    submitHandler: function(form) {
      form.submit();
    }
});


//Validacion personalizada: DNI solo con numeros

$.validator.addMethod("unicamenteNumeros", function (value, element) {
  return /^\d+$/.test(value);
}, "El DNI solo debe contener números..");
