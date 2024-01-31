$(document).ready(function (){
    $('#contact-form').on('submit', function(event){
        event.preventDefault();
        var name = $('.name').val();
        var email = $('.user_email').val();
        var telephone = $('.telephone').val();
        var message = $('.message').val();
        console.log(email);
        $.ajax (
            {
                url :'contact-email',
                method:'POST',
                data:{
                    _token:$('meta[name="csrf-token"]').attr('content'),
                    name: name,
                    email: email,
                    telephone: telephone,
                    message: message,
                },
                success:function(data){

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Email Sent",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    location.reload();

                },
                error:function(error){
                    console.error(error.reponseText);
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "Try Again",
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
            });
    });
});