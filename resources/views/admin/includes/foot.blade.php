<!-- REQUIRED JS SCRIPTS -->



<!-- jQuery 3 -->

<script src="{!! asset('admin_theme/bower_components/jquery/dist/jquery.min.js') !!}"></script>

<script src="{!! asset('admin_theme/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- fullCalendar -->

<script src="{!! asset('admin_theme/bower_components/moment/moment.js') !!}"></script>

<script src="{!! asset('admin_theme/dist/js/modernizr.js') !!}"></script>

<script src="{!! asset('admin_theme/dist/js/main.js') !!}"></script>

<!-- <script src="{{URL::asset('bower_components/moment/moment.js')}}"></script> -->

<script src="{{URL::asset('bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<!-- 
<script src="{{URL::asset('dist/js/modernizr.js')}}"></script> -->

<script src="{{URL::asset('dist/js/jquery.timepicker.js')}}"></script>

<script src="{{URL::asset('dist/js/bootstrap-datepicker.min.js')}}"></script>

<script src="{{URL::asset('dist/js/perfect-scrollbar.js')}}"></script>
<!-- 
<script src="{{URL::asset('dist/js/main.js')}}"></script> -->

<script src="{{ URL::asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>

<script src="{{ URL::asset('/js/additional-methods.min.js')}}" type="text/javascript"></script>

<script src="{{ URL::asset('admin_theme/dist/js/custom.js')}}" type="text/javascript"></script>  



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.1/jquery.toast.min.js"></script>



@if (session('success'))



<script type="text/javascript">



$.toast({



    heading: 'Success',



    text: '{{ session('success') }}',



    showHideTransition: 'slide',



    position: 'bottom-right',



    stack: 2,



    icon: 'success'



});



</script>



@php



	session()->forget('success');



@endphp



@endif







@if (session('error'))



<script type="text/javascript">



$.toast({



    heading: 'Error',



    text: '{{ session('error') }}',



    position: 'bottom-right',



    stack: 2,



    icon: 'error',



    loader: true,        // Change it to false to disable loader



    loaderBg: '#9EC600'  // To change the background



})



</script>



@php



	session()->forget('error');



@endphp



@endif



<script src="{{ URL::asset('/tinymce/tinymce.min.js')}}" type="text/javascript"></script>

<script> $(document).ready(function () { if ($(".mymce").length > 0) { tinymce.init({ selector: "textarea.mymce" , theme: "modern" , height: 200 , plugins: [ "advlist autolink link image imagetools lists charmap print preview hr anchor pagebreak spellchecker" , "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking" , "save table contextmenu directionality emoticons template paste textcolor" ] , toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l ink image | print preview media fullpage | forecolor backcolor emoticons",
        images_upload_url : 'upload.php',
        automatic_uploads : false,

        images_upload_handler : function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'upload.php');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.file_path);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        }, });  } }); </script>

