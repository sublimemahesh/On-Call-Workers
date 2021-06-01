$('#submit').click(function (event) {
    event.preventDefault();
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if (!$('#category').val() || $('#category').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please select category...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#sub_category').val() || $('#sub_category').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please select sub category...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#description').val() || $('#description').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please enter the description...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#district').val() || $('#district').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please select district...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#city').val() || $('#city').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please select city...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#name').val() || $('#name').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please enter the name...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#email').val() || $('#email').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please enter the email...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!emailReg.test($('#email').val())) {
        swal({
            title: "Error!",
            text: 'Please enter a valid email..!',
            showConfirmButton: false,
            timer: 1500,
            type: 'error',
            showCancelButton: false
        })

    } else if (!$('#phone').val() || $('#phone').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please enter the phone number...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#captcha').val() || $('#captcha').val().length === 0) {
        swal({
            title: 'Error..!',
            text: 'Please enter captcha...!',
            type: 'error',
            showCancelButton: false,
            timer: 2000,
            showConfirmButton: false
        });
    } else {
        var formData = new FormData($('#enquiry-form')[0]);
        $.ajax({
            url: "post-and-get/ajax/enquiry.php",
            type: "POST",
            data: formData,
            async: false,
            dataType: 'json',
            success: function (result) {
                if (result == 'success') {
                    swal({
                        title: "Success!",
                        type: 'success',
                        text: "Enquiry details were saved successfully!.....!",
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
                        text: "There was an error. Please try again later!.....!",
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