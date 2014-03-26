<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
  <head>
    <title>TRESemmé - Unilever</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta http-equiv="X-UA-Compatible" content="IE=9"/>
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/app.css" />
		<?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ba-hashchange.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>
  </head>
  <body>
		<div class="overlay hide">
			<div class="close"><div>&times;</div></div>
			<div class="product"></div>
			<div class="main">
				<div class="header"></div>
				<div class="copy"></div>
			</div>
		</div>
		
		<div id="container"></div>
		<div id="temp"></div>
		
		<script> 
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ 
		(i[r].q=i[r].q||[]).push(arguments);},i[r].l=1*new Date();a=s.createElement(o), 
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m);
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga'); 

		ga('create', 'UA-41200864-1', ''); 
		ga('send', 'pageview'); 

		</script>
		
  </body>
</html>
