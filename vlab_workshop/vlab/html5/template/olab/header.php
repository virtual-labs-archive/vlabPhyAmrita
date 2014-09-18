<!DOCTYPE HTML>
<html>
<head>
<!-- Enable IE9 Standards mode -->
<meta http-equiv="X-UA-Compatible" content="IE=9" >
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $GLOBALS['sim_title']; ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo getTempCss('reset.css'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo getTempCss('grid.css'); ?>" />
<link href="<?php echo getTempCss('mainstyle.css'); ?>" rel="stylesheet" type="text/css" />
<script src="js/jquery-latest.js"></script>
<!--[if IE]><script src="js/excanvas.js"></script><![endif]-->
<?php getIncludes(); ?>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<script src="js/js-webshim/1.9.7/minified/extras/modernizr-custom.js"></script>
<script> 
if( !Modernizr.inputtypes.range ){  
		document.write("<script type=\"text/javascript\" src=\"js/js-webshim/1.9.7/minified/polyfiller.js\"></"+"script>");
        $(document).ready(function(){
			$.webshims.setOptions("waitReady", false);
     		$.webshims.polyfill('forms-ext');
		});  
    };  
// Set up the yepnope (Modernizr.load) directives... 
/*Modernizr.load([
{
	
    // Test if Input Range is supported using Modernizr
    test: Modernizr.inputtypes.range,
	    // If ranges are not supported, load the slider script and CSS file
	
    nope: 
	
	[     
        // The slider CSS file
        'js/js-webshim/minified/extras/mousepress.js'       
        // The slider JS file
        ,'js/js-webshim/minified/polyfiller.js'     
    ],
    complete : function () {
	$.webshims.setOptions("waitReady", false);
      $.webshims.polyfill('forms-ext');
    }
}
]);*/

</script>

</head>
<body>
<div class="main">
<header id="silumatorTemp">
  <div class="g99 logo">
  </div>
  <!-- end .g99 -->
    <div class="g495 mainTitle">
    <p id="expName"><?php echo $GLOBALS['sim_title']; ?></p>
  </div>
  <!-- end .g495 -->
    <div class="g198 menuSet">
          
  </div>
  <!-- end .g198 -->
<div class="g792 bannerFoot">
<ul id="olabmenuBar">
  	<li><a href="#">SAVE</a></li>
    <li><a href="#">FULLSCREEN</a></li>
    <li><a href="#">EXIT</a></li>
  </ul>
</div>
    <!-- end .grid_8 -->
</header><!-- /header -->