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
    
    //smooth scroll and Active link
    $(document).ready(()=>{
        let a  = location.pathname.replace(/^\//,'');
        let b =  a.split('/');
        
        //location.hash != "#_=_" ? $('.navbar-nav li a[href*='+b[b.length - 1]+']').addClass('active') : $('.navbar-nav li a[href*='+location.hash+']').addClass('active');
        
        if(location.hash != "" && location.hash != "#_=_"){
            var targetOffset = $(location.hash).offset().top;
            $('html,body').animate({scrollTop: targetOffset}, 500);
            $('.navbar-nav li a[href*='+location.hash+']').addClass('active');
        }else{
            location.hash != "#_=_" ? $('.navbar-nav li a[href*='+b[b.length - 1]+']').addClass('active') : "";
        }
            
    })

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


        $(function() {
            $('#row_dim').hide(); 
            $('#type').change(function(){
                if($('#type').val() == 'corporate') {
                    $('#row_dim').show(); 
                    $('.hide-corporate').hide();
                } else {
                    $('#row_dim').hide(); 
                    $('.hide-corporate').show();
                } 
            });
        });



         $('.panel-question').click(function(){
           $('.panel-question').removeClass("active");
           $(this).addClass("active");
        });


  });

//active link
$(function(){
    if($('.sidebar li a[href*="'+location.pathname+'"] ').length != -1){
        $('.sidebar li a[href*="'+location.pathname+'"] ').parent('li').addClass('active')
    }
}());

