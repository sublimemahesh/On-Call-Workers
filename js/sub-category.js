$(document).ready(function() {
    $('#category').change(function() {
        var category = $(this).val();

        $.ajax({
            url: "post-and-get/ajax/sub-category.php",
            type: "POST",
            data: {
                category,
                action: 'GETSUBCATEGORIESBYCATEGORY'
            },
            dataType: "JSON",
            success: function(jsonStr) {
                var html = '<option value=""> -- Pleas select sub category-- </option>';
                $.each(jsonStr, function(i, data) {
                    html += '<option value="' + data.id + '">';
                    html += data.name;
                    html += '</option>';
                });
                $('#sub_category').empty();
                $('#sub_category').append(html);
            }
        });
    });
});