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

})