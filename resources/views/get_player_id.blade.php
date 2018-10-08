<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js"></script>
  <script>
    var OneSignal = window.OneSignal || [];
    OneSignal.push(["init", {
      appId: "95fac06d-591c-4cab-afd6-5cdf6387a235",
      autoRegister: true, /* Set to true to automatically prompt visitors */
      notifyButton: {
          enable: true /* Set to false to hide */
      }
    }]);
    </script>
    <script>
          OneSignal.push(function() {
        OneSignal.getUserId(function(userId) {
          
         document.getElementById("player_id").value = userId;
         document.getElementById("form1").submit();
        });
                     
      });
  </script>
  <form id="form1" name="onesignal_form" method="post" action="{{ url('onesignal_id') }}">
    {{ csrf_field() }}
    <input type="hidden" id="player_id" name="player_id" value="">
    <input type="hidden" id="user_id" name="user_id" value="{{ request()->segment(2) }}">
    
  </form>