<html>
<head>
	<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen"> 
</head>
	<body>


	<div id="menuContainer">
<?php include_once("menu_template.php") ?>
</div>
	<div class="content">
		<h1>WELCOME</h1>
		<table border="4">
		<tr><td><div class="paging"><?php echo $pagination; ?></div></td></tr>
		<tr>
			<div class="data"><td><?php echo $table; ?></div><td></tr>
	</table border="4">
		<br />
		<?php echo anchor('person/add/','add new data',array('class'=>'add')); ?>
	</div>
</body>
</html>