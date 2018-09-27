<div id="preloader">
  <div id="loading">
    <img src="{{asset('template/loading.gif')}}" width="80">
    <p>Harap Tunggu</p>
  </div>
</div>

<script type="text/javascript">
  var loading = document.getElementById('preloader');

  window.addEventListener('load', function(){
    loading.style.display="none";
  });
</script>
