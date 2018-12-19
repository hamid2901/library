$(document).ready(function(){ 

    $('.ConfirmSwitch').on({
        click: function() {
            var curInput = $(this).siblings();
            var id = curInput.attr("id");
                if(curInput.prop('checked') == false) {
                    let confirm = 1;
                    confirmArticle(id, confirm);
                } else {
                    let confirm = 0;
                    confirmArticle(id, confirm);
                }
            
        }
    });


    function confirmArticle(_id, _confirm){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: '/admin/articles/confirm',
            contentType: "application/json",
            data:{
                "id": _id,
                "confirm": _confirm
            },
            error: function() {
                console.log(this.data);
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
            },
            method: "POST"
        });
    }


});