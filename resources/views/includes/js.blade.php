

    <script src="{{URL::asset('js/jquery.min.js')}}"></script>



    <script src="{{URL::asset('js/popper.min.js')}}" ></script>



    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>



    <script src="{{URL::asset('js/custom.js')}}"></script>



    <script src="{{ URL::asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('/js/additional-methods.min.js')}}" type="text/javascript"></script>  

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>

<script>

  var OneSignal = window.OneSignal || [];

  OneSignal.push(function() {

    OneSignal.init({

      appId: "95fac06d-591c-4cab-afd6-5cdf6387a235",

      autoRegister: true,

      notifyButton: {

          enable: true

      }

      });

        OneSignal.getUserId(function(userId) {

    console.log("OneSignal User ID:", userId);
    console.log("OneSignal url1:", url1);

  });

  });

</script>



<script>

  $(document).ready(function(){

    

    $(document).on('click','.nav-link.login',function(){

      var OneSignal = window.OneSignal || [];

      OneSignal.push(function() {

        OneSignal.getUserId(function(userId) {

          $('#login_player_field').val(userId);


         var path={!! json_encode(url('/')) !!};

         var url1=path+"/user/dashboard";
         
        
        $.ajax({

          url:path+"/player_id_session",

          method:"POST",

          data:{"_token":"{{ csrf_token() }}","id":userId,"url":url1},

          success:function(data){

          }

        });

        });

      });

    });

  });

</script>



    <script>

             $(document).ready(function(){

                $('.login_modal12').validate({

                    rules: {                       

                       email: {

                           required: true,

                        },

                        password: {

                           required: true,

                        }

                                   

                    }

                });

            });

        </script>

    <script>

             $(document).ready(function(){

                $('.forgot_password').validate({



                    rules: {                       

                       email: {

                           required: true,

                        }                                 

                    }

                });

            });

        </script>



     <script>

             $(document).ready(function(){

                $('.login_signUp12').validate({



                    rules: {                       

                       userType: {

                           required: true,

                        },

                        name: {

                           required: true,

                        },

                        email: {

                           required: true,

                        },

                        password: {

                           required: true,

                        },

                        confirmPassword: {

                           required: true,
                            equalTo: "#password",
                           },
                           pincode:{
                            number: true,
                           }
                    }

                });

            });

        </script>



<script>

        /*Scroll to top when arrow up clicked BEGIN*/

$(window).scroll(function() {

    var height = $(window).scrollTop();

    if (height > 100) {

        $('#back2Top').fadeIn();

    } else {

        $('#back2Top').fadeOut();

    }

});

$(document).ready(function() {

    $("#back2Top").click(function(event) {

        event.preventDefault();

        $("html, body").animate({ scrollTop: 0 }, "slow");

        return false;

    });



});

</script>









    