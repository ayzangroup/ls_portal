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
 


    //smooth scroll
    $('.navbar-nav li a, .list-unstylisted li a').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
        && location.hostname == this.hostname) {
          var $target = $(this.hash);
          $target = $target.length && $target
          || $('[name=' + this.hash.slice(1) +']');
          if ($target.length) {
            var targetOffset = $target.offset().top;
            $('html,body')
            .animate({scrollTop: targetOffset}, 500);
           return false;
          }
        }
      });



 

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
            $('.hide_individual').hide(); 
            $('.second_form').hide(); 
            
            $('#form_continue').click(function(){
                $('#first_signUp_form').animate({
                    left: -500,
                    opacity:0

                }).hide().next().animate({
                        left:0,
                        opacity:1
                    
                }).show();
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
            
            $("#account-type-radio input[name='accounttype']").change(function(){
                if ($(this).val() == 'corporate') {
                    $('.hide_individual').show(); 
                    $('.hide-corporate').hide();
                } else {
                    $('.hide_individual').hide(); 
                    $('.hide-corporate').show();
                } 
            });
        });

        $('#signupmodal').modal('show');

         $('.panel-question').click(function(){
           $('.panel-question').removeClass("active");
           $(this).addClass("active");
        });


  });