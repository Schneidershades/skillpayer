<!--SCRIPT FILES-->
<script src="{{URL::to('/assets/js/jquery.min.js')}}"></script>
<script src="{{URL::to('/assets/js/bootstrap.js')}}" type="text/javascript"></script>
<!-- <script src="{{URL::to('/assets/js/materialize.min.js')}}" type="text/javascript"></script> -->
<script src="{{URL::to('/assets/js/custom.js')}}"></script>
<!--Start of Tawk.to Script-->

 <script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/5a8ef002d7591465c707eb72/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
</script>

<!--End of Tawk.to Script-->
@yield('scripts')