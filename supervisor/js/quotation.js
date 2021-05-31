//update
$(document).ready(function () {
    $('#btn-save').click(function (event) {
        event.preventDefault();

        $('#btn-save').hide();
        $('#update-loading').show();

        if (!$('#title').val() || $('#title').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the title...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-save').show();
            $('#update-loading').hide();

        } else {

            var formData = new FormData($("form#quotation-form")[0]);

            $.ajax({
                url: "ajax/quotation.php",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function (result) {

                    if (result.status === 'error') {
                        swal({
                            title: "Error!",
                            text: "There was an error. Please try again later",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        $('#btn-save').show();
                        $('#update-loading').hide();

                        return false;
                    } else {
                        swal({
                            title: "Success.!",
                            text: "Quotation saved successfully.",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 1500);

                    }
                }
            });
        }
        return false;
    });
    $('#btn-update').click(function (event) {
        event.preventDefault();
        $('#btn-update').hide();
        $('#update-loading').show();

        if (!$('#title').val() || $('#title').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the title...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else {

            var formData = new FormData($("form#edit-quotation-form")[0]);

            $.ajax({
                url: "ajax/quotation.php",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function (result) {
                    if (result.status === 'error') {
                        swal({
                            title: "Error!",
                            text: "There was an error. Please try again later",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        $('#btn-update').show();
                        $('#update-loading').hide();

                        return false;
                    } else {
                        swal({
                            title: "Success.!",
                            text: "Quotation updated successfully.",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        setTimeout(() => {
                            window.location.replace("manage-quotations.php?id=" + result.job);
                            // location.reload();
                        }, 1500);
                        
                    }
                }
            });
        }
        return false;
    });
    $('.delete-quotation').click(function () {

        var id = $(this).attr("data-id");

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this quotation!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {

            $.ajax({
                url: "ajax/quotation.php",
                type: "POST",
                data: { id: id, option: 'delete' },
                dataType: "JSON",
                success: function (jsonStr) {
                    if (jsonStr.status) {

                        swal({
                            title: "Deleted!",
                            text: "Quotation has been deleted.",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        $('#row_' + id).remove();

                    }
                }
            });
        });
    });
});