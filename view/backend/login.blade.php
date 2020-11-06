
<!DOCTYPE html>
<head>
	<title>login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<base href="{{ asset('') }}">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link rel="stylesheet" href="backend/css/bootstrap.min.css" >
	<link href="backend/css/style.css" rel='stylesheet' type='text/css' />
	<link href="backend/css/style-responsive.css" rel="stylesheet"/>
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="backend/css/font.css" type="text/css"/>
	<link href="backend/css/font-awesome.css" rel="stylesheet"> 
	<script src="backend/js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Sign In Now</h2>
	<form action="{{ route('login.admin.post') }}" method="post">
		@csrf
		<input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
		<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
		<div class="clearfix"></div>
		<input type="submit" value="Sign In" name="login">
	</form>
</div>
</div>
<!-- ---------------------------------- -->
<script src="backend/js/bootstrap.js"></script>
<script src="backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="backend/js/scripts.js"></script>
<script src="backend/js/jquery.slimscroll.js"></script>
<script src="backend/js/jquery.nicescroll.js"></script>
<script src="backend/js/jquery.scrollTo.js"></script>
</body>
</html>
