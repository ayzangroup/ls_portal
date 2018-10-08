@include('js')
<script>
  $(document).ready(function(){
    var url={!!json_encode('/') !!};
    $.ajax({
      url:url+'/get_player_id',
      method:'GET',
      success:function(data)
      {
        document.write({id:dat})
        console.log(data);
      }
    })
  });
</script>