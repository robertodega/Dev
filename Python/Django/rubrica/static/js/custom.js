function searchWithId(id) {
    console.log($('#id').val());
    $('#searchContactForm').attr('action', '/search/' + $('#id').val() + '/');
    $('#searchContactForm').submit();
}