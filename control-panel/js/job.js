$(document).ready(function () {

    $('.assign-supervisor').click(function () {

        let job = $(this).attr("data-id");
        let arr = '';
        // const inputOptions = '';
        $.ajax({
            url: "post-and-get/ajax/supervisor.php",
            type: "POST",
            data: {
                option: 'GETALLSUPERVISORS'
            },
            dataType: 'json',
            success: function (result) {

                var myArrayOfThings = Array();
                $.each(result, function (key, supervisor) {
                    var arr = Array();
                    arr['id'] = supervisor.id;
                    arr['name'] = supervisor.name;
                    myArrayOfThings.push(arr);
                });

                var options = {};
                $.map(myArrayOfThings,
                    function (o) {
                        options[o.id] = o.name;
                    });

                // setTimeout(() => {
                Swal.fire({
                    title: 'Assigned supervisor for this job.',
                    input: 'select',
                    inputOptions: options,
                    inputPlaceholder: 'Select a supervisor',
                    showCancelButton: true,
                    inputValidator: (value) => {
                        if (value) {
                            $.ajax({
                                url: "post-and-get/ajax/job.php",
                                type: "POST",
                                data: {
                                    supervisor: value,
                                    job: job,
                                    option: 'ASSIGNSUPERVISOR'
                                },
                                dataType: 'json',
                                success: function (result) {
                                    if (result) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Assigned!',
                                            text: 'Supervisor has been assigned to this job.',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        $('#row_' + job).remove();
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error!',
                                            text: 'There was an error',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                    }
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Please select a supervisor...!',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                })
                // }, 1000)
            }
        });

        // const inputOptions = new Promise((resolve) => {
        //     setTimeout(() => {
        //         resolve({
        //             arr

        //         })
        //     }, 1000)
        // })


    })
    $('.approve-job').click(function () {
        var id = $(this).attr("data-id");

        Swal.fire({
            title: 'Are you sure?',
            text: `You'r about to approve this job!`,
            icon: `warning`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Yes, approve it!`
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "post-and-get/ajax/job.php",
                    type: "POST",
                    data: {
                        id,
                        option: 'APPROVEJOB'
                    },
                    dataType: "JSON",
                    success: function (data) {
                        if (data == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Confirmed!',
                                text: 'Job has been Approved successfully.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#row_' + id).remove();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'There was an error.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }

                    }

                })
            }
        })
    });
    $('.complete-job').click(function () {
        var id = $(this).attr("data-id");

        Swal.fire({
            title: 'Are you sure?',
            text: `You'r about to complete this job!`,
            icon: `warning`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Yes, complete it!`
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "post-and-get/ajax/job.php",
                    type: "POST",
                    data: {
                        id,
                        option: 'COMPLETEJOB'
                    },
                    dataType: "JSON",
                    success: function (data) {
                        if (data == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Completed!',
                                text: 'Job has been completed successfully.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#row_' + id).remove();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'There was an error.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }

                    }

                })
            }
        })
    });

})