
$(function(){
    $(document).ready(function(){
        setTimeout(function(){
            $('.no_prod_modal').removeClass('no_prod_modal');
            $('.bg_first').css('display','block');
            var md_h = $('.pb_content').height() + 60;
            $('.prod_modal').css('height',md_h+'px');
        }, 5000);
    });

    $(document).on('click','.pb_closer_lng', function(){
        $('.popup_modal').hide(500);
        $('.bg_long').css('display','none');
        $('.button_long').css('display','block');
    });

    $(document).on('click','.button_long', function(){
        $(this).css('display','none');
        long_modal();
    });

    $(document).on('click','.pb_closer', function(){
        $('.popup_modal').hide(500);
        $('.popup_trigger').addClass('no_prod_modal');
        $('.bg_first').css('display','none');
        setTimeout(function(){
            long_modal();
        }, 7000);
    });

    $(document).on('click','.pb_closer_lng', function(){
        $.ajax({
            url: "/include/res/long_modal.php",
            type: "POST",
            dataType:"json",
            data:{long:'Y'},
            success: function(data){
                console.log(data.LONG);
            },
            complete: function(data){}
        });
        return false;
    });
    $(document).on('click','.pb_closer', function(){
        $.ajax({
            url: "/include/res/prod_modal.php",
            type: "POST",
            dataType:"json",
            data:{prod:'Y'},
            success: function(data){
                console.log(data.PROD);
            },
            complete: function(data){}
        });
        return false;
    });
});


function long_modal(){
    if (document.getElementsByClassName('prod_modal').length > 0){
        if($('.prod_modal').hasClass("no_prod_modal")) {
            show_long_modal();
        }else{
        }
    }else {
        show_long_modal();
    }
}




