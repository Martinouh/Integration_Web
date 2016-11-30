/**
 * Created by Rom on 27/11/2016.
 */

$( document ).ready(function() {
    $('.icon').click(function () {
        event.preventDefault();
        var id = $(this).attr('alt');
        var parent = $(this).parent().parent().parent();
        $.post('php/traiteForm.php?rq=favoris&idMed='+id,function(data){
          parent.remove();
        })
    })
})

function mdpPerdu(){
    event.preventDefault();
    var formData = new FormData($('#formMdpPerdu')[0]);
    $.ajax({
        url: 'php/traiteForm.php?rq=mdpPerdu',
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#content').html(data);
        }

    })
}


