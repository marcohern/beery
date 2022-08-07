<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Forty by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        @vite(['resources/css/forty/fontawesome-all.min.css','resources/css/forty/main.css','resources/css/app.css'])
		<noscript><link rel="stylesheet" href="templates/forty/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
				<x-header />
				<x-menu />

                {{ $slot }}
				
				<x-footer/>

			</div>

		<!-- Scripts -->
		<script src="templates/forty/assets/js/jquery.min.js"></script>
		<script src="templates/forty/assets/js/jquery.scrolly.min.js"></script>
		<script src="templates/forty/assets/js/jquery.scrollex.min.js"></script>
		<script src="templates/forty/assets/js/browser.min.js"></script>
		<script src="templates/forty/assets/js/breakpoints.min.js"></script>
		@vite(['resources/js/app.js'])

	</body>
</html>