$('.datatd').width($(window).width() * 0.2);
$('.datatd').height($(window).height() * 0.08);
$('.datatdErr').width($('.dataTable').width());
$('.formField').width($(window).width() * 0.2);

$('.editableData').on('click', function() {
    $(this).attr('contenteditable', 'true');
    /* *
    $(this).on('blur', function () {
        $('#updateSubject').val($(this).attr('subject'));
        $('#updateUsername').val($(this).attr('username'));
        $('#updatePassword').val($(this).attr('password'));
        $('#updateNote').val($(this).attr('note'));
        $('#updateRowForm').submit();
    });
    /* */
});

function deleteRow(id) {
    if (confirm("Are you sure you want to delete this row?")) {
        $.ajax({
            url: './?action=delete&refId=' + id,
            type: 'POST',
            success: function(response) {
                
            },
            error: function(xhr, status, error) {
                alert('Error deleting row: ' + error);
            }
        });
    }
    document.location.reload();
}