$(function () {


    $('.j_open').click(function () {
        $(this).toggleClass('closeform');
        $('.' + $(this).attr('rel')).slideToggle();
        $('.j_formsubmit').find('input[class!="noclear"]').val('');
        $('.j_formsubmit').find('input[name="action"]').val('create');
    });

    $(".j_open").trigger("click");

    $('.j_open_search').click(function () {
        $(this).toggleClass('closeform');
        $('.' + $(this).attr('rel')).slideToggle();
        $('.j_formsubmit_search').find('input[class!="noclear"]').val('');
        $('.j_formsubmit_search').find('input[name="action"]').val('search');
    });

    //SELETOR, EVENTO/EFEITO, CALLBACK, AÇÃO
    $('.j_formsubmit').submit(function () {
        var form = $(this);
        var data = $(this).serialize();

        $.ajax({
            url: 'app/Controllers/ajax.php',
            data: data,
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                form.find('.form_load').fadeIn(500);
                form.find('.trigger').fadeOut(500, function () {
                    $(this).remove();
                });
            },
            success: function (resposta) {
                if (resposta.error) {
                    form.find('.trigger-box').html('<div class="trigger trigger-error">' + resposta.error + '</div>');
                    form.find('.trigger-error').fadeIn();
                } else {
                    form.find('.trigger-box').html('<div class="trigger trigger-success">' + resposta.success + '</div>');
                    form.find('.trigger-success').fadeIn();
                    form.find('input[class!="noclear"]').val('');
                }
                form.find('.form_load').fadeOut(500);
            }
        });

        return false;
    });

    $('.j_formsubmit_search').submit(function () {
        var form = $(this);
        var data = $(this).serialize();

        $.ajax({
            url: 'app/Controllers/ajax.php',
            data: data,
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                form.find('.form_load').fadeIn(500);
                form.find('.trigger').fadeOut(500, function () {
                    $(this).remove();
                });
                $('.search').find('.j_list').html('');
            },
            success: function (resposta) {
                if (resposta.error) {
                    form.find('.trigger-box').html('<div class="trigger trigger-error">' + resposta.error + '</div>');
                    form.find('.trigger-error').fadeIn();
                } else {
                    form.find('.trigger-box').html('<div class="trigger trigger-success">' + resposta.success + '</div>');
                    form.find('.trigger-success').fadeIn();
                    form.find('input[class!="noclear"]').val('');
                    
                    $('.search').find('.j_list').html(resposta.totalresult+'<pre>'+JSON.stringify(resposta.result, null, 4)+'</pre>');
//                    $(resposta.result).prependTo($('.search').find('.j_list'));
//                    $('.j_register').fadeIn(400);
                }
                form.find('.form_load').fadeOut(500);
            }
        });

        return false;
    });
});

