function getGenres() {
    $.ajax({
        type: 'POST',
        url: 'userAction.php',
        data: 'action_type=view&' + $("#userForm").serialize(),
        success: function (html) {
            $('#userData').html(html);
        }
    });
}

function genreAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var genreData = '';
    if (type == 'add') {
        genreData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&id=' + id;
    } else if (type == 'edit') {
        genreData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        genreData = 'action_type=' + type + '&id=' + id;
    }
    $.ajax({
        type: 'POST',
        url: 'genreAction.php',
        data: genreData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Genre data has been ' + statusArr[type] + ' successfully.');
                getGenres();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}

function editGenre(id) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'genreAction.php',
        data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#idEdit').val(data.id);
            $('#nameEdit').val(data.name);
            $('#emailEdit').val(data.email);
            $('#phoneEdit').val(data.phone);
            $('#editForm').slideDown();
        }
    });
}