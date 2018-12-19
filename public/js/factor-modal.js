
function showModal(_id){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url: '/admin/factors/'+ _id +'detail',
        contentType: "application/json",
        data:{
            "id": _id
        },
        error: function() {
            console.log("error");
        },
        dataType: 'json',
        success: function(data) {
            console.log(data);
        },
        method: "POST"
    });
}
