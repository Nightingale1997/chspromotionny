<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="sv-SE" class="no-js">
<head>
<title> </title>
<meta name="keywords" content=" "/>
<meta name="description" content=" "/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="initial-scale=1" />
<link href='http://fonts.googleapis.com/css?family=Montserrat|Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link href='http://54.154.173.78/wp/wp-content/themes/bobbyhouston/style.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://54.154.173.78/dev/css/fullPage.css">
<style>
header,body,html,.wrapper {
	height:100%;
	width:100%;
	margin:0;
	padding:0;
}
header {
	background-image:url('http://chspromotion.se/images/geniknol.JPG');
	background-size:cover;
	background-position: top center;
	background-repeat:no-repeat;
}
body {
	background:#fafafa;
	color:#1e1e1e;
	font-family:'Open Sans', 'Arial', 'Verdana', sans-serif;
}
h1,h2,h3,h4,h5,h6 {
	font-family:'Montserrat', 'Trebuchet MS', 'Helvetica', sans-serif;
}
header {
	position:fixed !important;
	z-index:1;
	color:rgba(211,211,211,0.7);
}
header p.title-date {
	margin:0;
	font-size:1.6em;
	font-weight: 300;
	font-style: italic;
	padding-left:10px;
}
header h1 {
	line-height:1em;
	padding:0;
	margin:0;
}
.title-shape-wrapper {
	position:absolute;
	bottom:0;
	right:0;
	text-align:center;
}
.title-shape {
	width: 0;
	height: 0;
	border-bottom: 500px solid rgba(211,211,211,0.7);
	border-left: 800px solid transparent;
}
.title-shape-wrapper .title-info {
	position:absolute;
	top:70%;
	margin-top:-10px;
	left:70%;
	margin-left:-10px;
	color:#1e1e1e;
}
.title-shape-wrapper .title-info span {
	display:block;
	margin:auto;
}

.wrapper {
	position:absolute;
	z-index:2;
}
	
</style>

<!--[if lt IE 9]>
	<script>
		document.createElement('header');
		document.createElement('nav');
		document.createElement('footer');
		document.createElement('article');
	</script>
<![endif]-->
</head>
<body>
	
<div id="index">
	<header>
	  <div class="title-container" style="width:900px;margin:auto;">
		<p class="title-date">25 mars 2015</p>
		<h1>E-DAY</h1>
	  </div>
	  <div class="title-shape-wrapper">
	    <div class="title-shape"></div>
	    <div class="title-info">
		  Se schema
		  <span class="fa-stack fa-lg">
		    <i class="fa fa-circle fa-stack-2x"></i>
		    <i class="fa fa-chevron-down fa-stack-1x fa-inverse"></i>
		  </span>
	    </div>
	  </div>
	</header>
	
	<div class="wrapper">
	<section style="height:400px;width:100%;background:#009933">
	</section>
	</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://bobby.linexo.se/js/skrollr.js" /></script>
<script src="http://bobby.linexo.se/js/jquery.waypoints.min.js" /></script>
<script src="http://bobby.linexo.se/js/jquery.fullPage.min.js" /></script>
<script src="//rawgithub.com/davatron5000/Lettering.js/master/jquery.lettering.js"></script>
<script src="//rawgithub.com/davatron5000/FitText.js/master/jquery.fittext.js"></script>
<script type="text/javascript">	
$(document).ready(function() {
	$('#index').fullpage({
		scrollBar:true ,
		autoScrolling:false,
		responsive: 9000,
		resize: false,
		sectionSelector: 'header',
	});
	
	$("header h1").fitText(0.8);
	
	$('.wrapper').css({top: $(window).height() + "px"})
});
</script>
</body>
</html>