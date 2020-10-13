// Desarrollado por Geraldine Peña - Laboratorio Digital


// SEND FORMS
$('#form-contact').submit(function (e) {
    e.preventDefault()
    let thisForm = $(this)
    let data = $(this).serialize()
    let url = ''
    let inputs = $(this).find('input textarea')
    $.ajax({
        type: "post",
        url: url,
        data: data,
        dataType: "text",
        beforeSend: function () {
            thisForm.find('button.btn').text('Procesando...')
            thisForm.find('button.btn').attr('disabled', 'true')
        }
    })
        .done(function (resp) {
            thisForm.find('button.btn').text('Enviar')
            console.log(resp);

            Swal.fire({
                toast: true,
                position: 'top-end',
                title: 'Tu solicitud se envió correctamente',
                text: '',
                type: 'success',
                showConfirmButton: false,
                timer: 7000
            })
            thisForm.find('button.btn').removeAttr('disabled')
            inputs.val('')

            // Cambia la dirección en el navegador sin redirigir a otra página 
            // history.pushState(null, "", "envio-exitoso");

        })
})