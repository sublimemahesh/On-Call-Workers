$('#submit').click(function (event) {
    event.preventDefault();
    if (!$('#name').val() || $('#name').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please enter name...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#title').val() || $('#title').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please enter title...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#image').val() || $('#image').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please select image...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#comment').val() || $('#comment').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please enter comment...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#captcha').val() || $('#captcha').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please enter captcha code...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else {
        var formData = new FormData($('#form-data')[0]);
        $.ajax({
            url: "post-and-get/ajax/comment.php",
            type: "POST",
            data: formData,
            async: false,
            dataType: 'json',
            success: function (result) {
                if (result == 'success') {
                    swal({
                        title: "Success!",
                        type: 'success',
                        text: "Your comment has been saved successfully!...!",
                        timer: 2000,
                        showConfirmButton: false
                    })
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else if (result == 'wrong_code') {
                    swal({
                        title: "Error!",
                        type: 'error',
                        text: "Please enter correct captcha code!...!",
                        timer: 2000,
                        showConfirmButton: false
                    });
                } else {
                    swal({
                        title: "Error!",
                        type: 'error',
                        text: "There was an error. Please try again later!...!",
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
});