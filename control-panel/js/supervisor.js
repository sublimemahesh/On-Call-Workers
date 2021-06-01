$(document).ready(function () {

    $('#create').click(function (event) {
        event.preventDefault();
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!$('#name').val() || $('#name').val().length === 0) {
            swal({
                title: 'Error..!',
                text: 'Please enter the name...!',
                type: 'error',
                showCancelButton: false,
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#phone').val() || $('#phone').val().length === 0) {
            swal({
                title: 'Error..!',
                text: 'Please enter the phone number...!',
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

        } else if (!$('#nic').val() || $('#nic').val().length === 0) {
            swal({
                title: 'Error..!',
                text: 'Please enter the NIC number...!',
                type: 'error',
                showCancelButton: false,
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#address').val() || $('#address').val().length === 0) {
            swal({
                title: 'Error..!',
                text: 'Please enter the address...!',
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
        } else {
            var formData = new FormData($('#form-data')[0]);
            $.ajax({
                url: "post-and-get/ajax/supervisor.php",
                type: "POST",
                data: formData,
                async: false,
                dataType: 'json',
                success: function (result) {
                    if (result == 'success') {
                        swal({
                            title: "Success!",
                            type: 'success',
                            text: "Supervisor details were saved successfully!.....!",
                            timer: 2000,
                            showConfirmButton: false
                        })
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
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
    $('#update').click(function (event) {
        event.preventDefault();
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!$('#name').val() || $('#name').val().length === 0) {
            swal({
                title: 'Error..!',
                text: 'Please enter the name...!',
                type: 'error',
                showCancelButton: false,
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#phone').val() || $('#phone').val().length === 0) {
            swal({
                title: 'Error..!',
                text: 'Please enter the phone number...!',
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

        } else if (!$('#nic').val() || $('#nic').val().length === 0) {
            swal({
                title: 'Error..!',
                text: 'Please enter the NIC number...!',
                type: 'error',
                showCancelButton: false,
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#address').val() || $('#address').val().length === 0) {
            swal({
                title: 'Error..!',
                text: 'Please enter the address...!',
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
        } else {
            var formData = new FormData($('#form-data')[0]);
            $.ajax({
                url: "post-and-get/ajax/supervisor.php",
                type: "POST",
                data: formData,
                async: false,
                dataType: 'json',
                success: function (result) {
                    if (result == 'success') {
                        swal({
                            title: "Success!",
                            type: 'success',
                            text: "Supervisor details were saved successfully!.....!",
                            timer: 2000,
                            showConfirmButton: false
                        })
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
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

    $('.toggle-activation').click(function (e) {

        e.preventDefault();

        let supervisor = $(this).attr("data-id");
        let type = $(this).attr("toggler");

        Swal.fire({
            title: 'Are you sure?',
            text: `You'r about to ${type == 0 ? "Active" : "Inactive"} this supervisor!`,
            type: `${type == 0 ? "info" : "error"}`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Yes, ${type == 0 ? "Active" : "Inactive"} this supervisor!`
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "post-and-get/ajax/supervisor.php",
                    type: "POST",
                    data: {
                        supervisor,
                        option: type == 0 ? "ACTIVEMEMBER" : "INACTIVEMEMBER"
                    },
                    dataType: "JSON",
                    success: function (data) {
                        if (data == "activated") {
                            Swal.fire('Activated!', 'Supervisor has been activated.', 'success')
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                        if (data == "inactivated") {
                            Swal.fire('Inactivated!', 'Supervisor has been inactivated.', 'success');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    }

                })
            }
        })

    })
    

})