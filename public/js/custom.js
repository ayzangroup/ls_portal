$(document).ready(function(){
	
	//loader
    setTimeout(function(){
        $(".loader-main").fadeOut('800');
        $('.carousel').fadeIn();
    },1000)



    //collpase
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find('.more-less')
            .toggleClass('fa-plus fa-minus');

    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);

     $('.panel-question a[data-toggle="collapse"]').addClass("collapsed"); 

     $(function() {
        $('.hide_individual').hide(); 
        $('.second_form').hide(); 
        
        $('#form_continue').click(function(){
            if($('.login_signUp12').valid()){
                $('#first_signUp_form').animate({
                    left: -500,
                    opacity:0
    
                }).hide().next().animate({
                        left:0,
                        opacity:1
                    
                }).show();
            }
        });
        $('#return_form_first').click(function(){
            $('#first_signUp_form').animate({
                left: 0,
                opacity:1
            }).show().next().hide().animate({
                left: 500,
                opacity:0
            });
        });
        
        $("#account-type-radio input[name='userType']").change(function(){
            if ($(this).val() == 'corp') {
                $('.hide_individual').show(); 
                $('.hide-corporate').hide();
            } else {
                $('.hide_individual').hide(); 
                $('.hide-corporate').show();
            } 
        });
    });

    //smooth scroll and Active link
    

    //smooth scroll
    // $('.navbar-nav li a, .list-unstylisted li a').click(function() {
    //     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    //     && location.hostname == this.hostname) {
    //       var $target = $(this.hash);
    //       $target = $target.length && $target
    //       || $('[name=' + this.hash.slice(1) +']');
    //       if ($target.length) {
    //         var targetOffset = $target.offset().top;
    //         $('html,body')
    //         .animate({scrollTop: targetOffset}, 500);
    //        return false;
    //       }
    //     }
    //   });



 

    // toggle mobile 
    var removeClass = true;
    $(".navbar-toggler").click(function () {
        $("body").toggleClass('open');
        removeClass = false;
    });

    $("body").click(function() {
        removeClass = false;
    });

    $("html").click(function () {
        if (removeClass) {
            $("body").removeClass('open');
        }
        removeClass = true;
    });


    //mobile dropdown 
    // if ($(window).width() < 551){
    //      $("#hideServices").click(function(){
    //         $("#showServices").toggle();
    //     });
    // };


    

         $('.panel-question').click(function(){
           $('.panel-question').removeClass("active");
           $(this).addClass("active");
        });


  });
(function(){
    let b =  location.pathname.split('/');

    if(location.hash != "" && location.hash != "#_=_"){
        var targetOffset = $(location.hash).offset().top;
        $('html,body').animate({scrollTop: targetOffset}, 500);
        $('.navbar-nav li a[href*="'+location.hash+'"]').length != -1 ? $('.navbar-nav li a[href*="'+location.hash+'"]').addClass('active') : "";
    }else{
        location.hash != "#_=_" && location.pathname !="/" ? $('.navbar-nav li a[href*="'+b[b.length - 1]+'"]').length == 1 ? $('.navbar-nav li a[href*="'+b[b.length - 1]+'"]').addClass('active'): ""  : "";
    }
}());

$('.navbar-nav li a').click(function(){
    $('.navbar-nav li a').removeClass('active');
    $(this).addClass('active');
});


//price calculator sticky
$(window).scroll(function(){
    if($('.calculator-details-box').length == 1 ){
        if($(window).scrollTop() > 456 && $(window).width() > 1200){
            let w = $('.calculator-details-box').width();
            $('.calculator-details-box').css({
                'position': 'fixed',
                'top':  '20px',
                'width' : w,
                'z-index':1000
            })
        }else{
            $('.calculator-details-box').css({
                'position': 'unset',
                'top':  '20px'
            })     
        }
    }
});
