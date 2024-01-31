$(document).ready(function () {
    $('#general-info').on('submit', function(event){
        event.preventDefault();

        var profile_name = $('#fullName').val();
        var profile_address = $('#profile-address').val();
        var profile_telephone = $('#profile-telephone').val();

        $.ajax(
        {
            url: '/update-profile',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                profile_name: profile_name,
                profile_address: profile_address,
                profile_telephone: profile_telephone,
                file_name: file_name,
            },
            success: function (data) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Profile Updated",
                    showConfirmButton: false,
                    timer: 1500
                });
                location.reload();
            },
            error: function (error) {
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

var file_name = null;

$(document).ready(function () {
    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0];

        let reader = new FileReader();
        reader.onload = e => {
            file_name = e.target.result;
            console.log(file_name);
        };
        reader.readAsDataURL(fileName);
    });
});