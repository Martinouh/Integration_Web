/**
 * Created by Rom on 11/12/2016.
 */
$(document).ready(function() {
        $('#form').on('submit',function(event){
            var rq = $('input[type="submit"]').attr('name');
            event.preventDefault()
            var formData = new FormData($(this)[0]);
           // if(!testOk($(this),btn)) return false;
            $.ajax({
                url: './php/traiteForm.php?rq='+rq,
                type: 'POST',
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('.js').html(data);
                    $('.js').fadeIn().delay(4000).fadeOut();
                }
            });
        });
})

