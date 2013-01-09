<html>
<head>
	
	<title>Employee</title>
	
<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen"> 
</head>
		<div id="menuContainer">
<?php include_once("menu_template.php") ?>
</div>
<body>
	<h1>Employee Details</h1>
	<div class="content">
		
		<div class="data">
		<table border="4">
			<tr>
				<td width="30%">ID</td>
				<td><?php echo $person->emp_no; ?></td>
			</tr>
			<tr>
				<td valign="top">Name</td>
				<td><?php echo $person->first_name; ?></td>
			</tr>
			<tr>
				<td valign="top">LName</td>
				<td><?php echo $person->last_name; ?></td>
			</tr>
			<tr>
				<td valign="top">Gender</td>
				<td><?php echo strtoupper($person->gender)=='M'? 'Male':'Female' ; ?></td>
			</tr>
			<tr>
				<td valign="top">Date of birth (dd-mm-yyyy)</td>
				<td><?php echo date('d-m-Y',strtotime($person->birth_date)); ?></td>
			</tr>
				<tr>
				<td valign="top">Hire Date (dd-mm-yyyy)</td>
				<td><?php echo date('d-m-Y',strtotime($person->hire_date)); ?></td>
			</tr>
		</table>
		</div>
		<br />
		<?php echo $link_back; ?>
	</div>
</body>
</html>