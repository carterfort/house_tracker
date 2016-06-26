<!DOCTYPE html>
<html>
<head>
	<title>{{env('HOUSE_NAME')}}</title>

	<link rel="stylesheet" href="/css/app.css" />

	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>

</head>
<body>

@include('navbar')

<div class="container">
	@yield('main')
</div>

</body>
</html>