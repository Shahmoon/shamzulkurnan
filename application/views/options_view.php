<!DOCTYPE html>

<html lang="en">
<head>

	<meta http-equiv="Content-Type" content="type/html; charset-utf-8">
	<title>vhgfgs<title>
		<style type="text/css" media="screen">
		label {display:block;}
		</style>
</head>
<body>
		<h2>Create<h2>
<?php echo form_open('site/create');?> ?>
<p>
	<label for="title">Title:</label>
	<input type= "text" name="title" id="title" />
</p>

<p>

	<label for="title">Title:</label>
	<input type= "text" name="content" id="content" />

</p>
<p>
	<input type="submit" value:"Submit" />
</p>
]
<br />

<h2>Read<h2>

<?php if (isset($records)) : ?>  
<?php foreach($records as $row) : ?>
	<h2><?php echo anchor ('site/delete/$row->id, $row->title'), $row->title; ?> </h2>
	<div> <?php echo $row->content; ?></div>
	<?php endforeach; ?>
	

<?php endif ; ?>
<be />

<h2>Delete</h2>

<p>to sample envouenofunvueFNVIUEFNIVU</p>

<?php echo form_close(); ?>
</body>
</html>
