<!DOCTYPE html>
<html>
	<head>
		<title>Isotope Tutorial</title>
		
		<link rel="stylesheet" href="style.css">
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js">
		</script>
		
		<script type="text/javascript" src="js/isotope.min.js"></script>
		
		<script type="text/javascript">
		
		$(document).ready(function(){
		var $container = $('#content');
$container.isotope({
	filter: '*',
	animationOptions: {
     duration: 750,
     easing: 'linear',
     queue: false,
   }
});

$('#nav a').click(function(){
  var selector = $(this).attr('data-filter');
    $container.isotope({ 
	filter: selector,
	animationOptions: {
     duration: 750,
     easing: 'linear',
     queue: false,
	 
   }
  });
  return false;
});

});
		</script>
	</head>
	
	<body>
		<div id="header"></div>
		<div id="nav">
			<ul>
				<li><a href="" data-filter="*">All</a></li>
				<li><a href="" data-filter=".cat1">Category 1</a></li>
				<li><a href="" data-filter=".cat2">Category 2</a></li>
				<li><a href="" data-filter=".cat3">Category 3</a></li>
			</ul>
		</div>
		
		<div id="content">
			<div class="box large cat1 cat3">
				<h2 class="box-title">Crimson</h2>
				<div class="box-text">
						A club about stuff. publications woot
				</div>
			</div>
			
			<div class="box cat1">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Urna vut, eros aliquet sagittis augue? Augue adipiscing duis? Et a placerat, magna enim? Lacus sit. Nunc montes tristique purus auctor. Nascetur? Vut amet, phasellus pulvinar et odio. Ut aliquet integer sed enim ac amet nunc? Tincidunt sit, cum ridiculus, placerat cum, vut magna ridiculus ut phasellus ridiculus? Eu hac, mattis adipiscing, montes adipiscing urna montes rhoncus! Odio placerat pellentesque risus urna elit, odio phasellus, rhoncus, est ridiculus purus etiam, penatibus integer! 
				</div>
			</div>
			
			<div class="box cat2 cat3">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Urna vut, eros aliquet sagittis augue? Augue adipiscing duis? Et a placerat, magna enim? Lacus sit. Nunc montes tristique purus auctor. Nascetur?
				</div>
			</div>
			
			<div class="box cat1">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Amet dolor? Diam cras ac quis a ut, augue massa cursus natoque cursus in sociis rhoncus, scelerisque mus ac. Pellentesque odio rhoncus, aliquet tempor? Nisi cursus lorem tincidunt penatibus eu scelerisque! Scelerisque mid rhoncus turpis eros? Nunc rhoncus in turpis, mus, nec augue, odio, mid tempor aliquam, ultricies.
				</div>
			</div>
			<div class="box cat2">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Diam cras ac quis a ut, augue massa cursus natoque cursus in sociis rhoncus, scelerisque mus ac. Pellentesque odio rhoncus, aliquet tempor? Nisi cursus lorem tincidunt penatibus eu scelerisque! Scelerisque mid rhoncus turpis eros? Nunc rhoncus in turpis, mus, nec augue, odio, mid tempor aliquam, ultricies.
				</div>
			</div>
			<div class="box cat2">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Urna vut, eros aliquet sagittis augue? Augue adipiscing duis? Et a placerat, magna enim? Lacus sit. Nunc montes tristique purus auctor. Nascetur? Vut amet, phasellus pulvinar et odio. Pellentesque odio rhoncus, aliquet tempor? Nisi cursus lorem tincidunt penatibus eu scelerisque! Scelerisque mid rhoncus turpis eros? Nunc rhoncus in turpis, mus, nec augue, odio, mid tempor aliquam, ultricies.
				</div>
			</div>
			
			<div class="box cat2 cat3">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Urna vut, eros aliquet sagittis augue? Augue adipiscing duis? Et a placerat, magna enim? Lacus sit.
				</div>
			</div>
			
			<div class="box cat1">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Amet dolor? Diam cras ac quis a ut, augue massa cursus natoque cursus in sociis rhoncus, scelerisque mus ac. Pellentesque odio rhoncus, aliquet tempor? Nisi cursus lorem tincidunt penatibus eu scelerisque! Scelerisque mid rhoncus turpis eros? Nunc rhoncus in turpis, mus, nec augue, odio, mid tempor aliquam, ultricies.
				</div>
			</div>
			
			<div class="box cat2 cat3">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Urna vut, eros aliquet sagittis augue? Augue adipiscing duis? Et a placerat, magna enim? Lacus sit. Nunc montes tristique purus auctor. Amet dolor? Diam cras ac quis a ut, augue massa cursus natoque cursus in sociis rhoncus, scelerisque mus ac. Pellentesque odio rhoncus, aliquet tempor? Nisi cursus lorem tincidunt penatibus eu scelerisque! Scelerisque mid rhoncus turpis eros? Nunc rhoncus in turpis, mus, nec augue, odio, mid tempor aliquam, ultricies.
				</div>
			</div>
		
		
		</div>
	</body>
</html>

