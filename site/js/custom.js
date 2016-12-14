/**
 * Created by Rom on 11/12/2016.
 */
$(document).ready(function() {
    $('input[type="submit"]').on('click',function(event){
            var rq = $(this).attr('name');
            event.preventDefault()
            if(!testOk($('#form'),rq)) {
                return false;
            }
            var formData = new FormData($('#form')[0]);
            $.ajax({
                url: './php/traiteForm?rq='+rq,
                type: 'POST',
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    traiteRetour($.parseJSON(data));
                }
            });
        });
});


function traiteRetour(data){
    $.map(data,function(val,i) {
        switch (i) {
            case 'inscription':
            case 'connexion':    $('#content').html(val);
                break;

            case 'updatePro':
            case 'inscriptionErreur':
            case 'erreurConnexion':     $('.js').html(val);
                                        $('.js').fadeIn().delay(4000).fadeOut();
                break;

            case 'contact':             $("#form :input").each(function(){
                                            if($(this).val()!='Envoyer') {
                                                $(this).val(' ');
                                            }
                                        });
                                        $('.js').html(val);
                                        $('.js').fadeIn().delay(4000).fadeOut();

                break;

        };
    });
};

function testOk(t,sName){
    var ok=true;
    var item=null;
    switch (sName){
        case 'submitContact':
            t.find('.formError').remove();
            item= t.find('#email');
            if(!mailOk(item.val())){
                item.after('<div class=formError><b>Mail non conforme</b></div>');ok=false;
            }
            item= t.find('#sujet');
            if(! item.val().split(' ').join('')) {
                item.after('<div class=formError><b>Vide ou seulement des espaces</b></div>'); ok=false;
            }
            item  = t.find('#message');
            if(! item.val().split(' ').join('').split("\n").join('')){
                item.after('<div class=formError><b>Vide ou seulement des espaces et/ou return</b></div>');  ok = false;
            }
            break;
        case 'insc_submit':
            t.find('.formError').remove();
            if(t.find('#mdp1').val()!= t.find('#mdpVerif').val()){
                t.find('#mdpVerif').after('<div class=formError><b>Les mots de passe ne correspondent pas.</b></div>'); ok=false;
            }
            break;
    }
    return ok;
}




function mailOk(mail){
    var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
    return reg.test(mail);
}

//$('.js').html(data);
//$('.js').fadeIn().delay(4000).fadeOut();
