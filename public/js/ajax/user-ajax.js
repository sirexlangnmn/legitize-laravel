$.ajax({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: '/user',
    datatType : 'json',
    type: 'POST',
    data: {
        'id' : 12,
        'name': 'john'
    },
    cache: false,
    contentType: false,
    processData: false,

    success:function(response) {
        alert(response);
    }
});