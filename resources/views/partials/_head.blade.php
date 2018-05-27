<title>@yield('title') || Welcome to Skill Payer</title>
<!-- META TAGS -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- FAV ICON(BROWSER TAB ICON) -->
<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<!-- FONTAWESOME ICONS -->
<link rel="stylesheet" href="{{URL::to('/assets/css/font-awesome.min.css')}}">
<!-- ALL CSS FILES -->
<!-- <link href="{{URL::to('/assets/css/materialize.css')}}" rel="stylesheet"> -->
<link href="{{URL::to('/assets/css/style.css')}}" rel="stylesheet">
<link href="{{URL::to('/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
<link href="{{URL::to('/assets/css/responsive.css')}}" rel="stylesheet">

@yield('stylesheets')
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/b3728923e7285dc0016804c5c/5a33b80b4a0e092ca3f6e0904.js");</script>