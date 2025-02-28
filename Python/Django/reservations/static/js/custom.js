function search(type) {
    let formName = 'searchForm_'+type+'';
    let url = '/search_'+type+'/';
    let idField = type+'id';
    let id = $('#'+idField+'').val();
    if(id){url = '/search_'+type+'/'+id+'/';}
    $('#'+formName+'').attr('action', url);
    $('#'+formName+'').submit();
}