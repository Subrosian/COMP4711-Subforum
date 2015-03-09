<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
/**
 * view/template.php
 *
 * Pass in $pagetitle (which will in turn be passed along)
 * and $pagebody, the name of the content view.
 *
 * ------------------------------------------------------------------------
 */
?>
<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>{title}</title>
	<link rel="stylesheet" href="/assets/css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<div>
			<div class="logo">
				<a href="/">Subforum</a>
			</div>
			{menubar}
                        {toggle_admin}
		</div>
	</div>
	<div id="contents">
            <h1>{title}</h1>
            {content}
	</div>
	<div id="footer">
		<div class="clearfix">
			<div id="connect">
				<a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook"></a><a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a><a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a><a href="http://www.freewebsitetemplates.com/misc/contact/" target="_blank" class="tumbler"></a>
			</div>
			<p>
				Copyright &copy; 2014,  <a href="mailto:abeljacoblim@gmail.com">Jacob Lim</a>, Set 4O.
			</p>
		</div>
	</div>
</body>
</html>