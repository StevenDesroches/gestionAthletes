$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#eventtypes-id').on('change', function () {
        var categoryId = $(this).val();
        if (categoryId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'eventtypes_id=' + categoryId,
                success: function (souseventtypes) {
                    $select = $('#souseventtypes-id');
                    $select.find('option').remove();
                    $.each(souseventtypes, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.description + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#souseventtypes-id').html('<option value="">Select Category first</option>');
        }
    });
});


