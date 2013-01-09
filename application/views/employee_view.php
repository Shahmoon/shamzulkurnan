<html>
<head>
<title>Employees</title>
</head>
<body>
<div>
Found <?php echo $num_results; ?> departments
</div>

<table>
	<thead>
	<th>emp_no</th>
	<th>birth_date</th>
	<th>first_name</th>
	<th>last_name</th>
	<th>gender</th>
	<th>hire_date</th>
</thead>
  
<tbody>
	<?php foreach($employee as $employees):?>
	<tr>
	<td><?php echo $employees->emp_no; ?></td>
	<td><?php echo $employees->birth_date; ?></td>
	<td><?php echo $employees->first_name; ?></td>
	<td><?php echo $employees->last_name; ?></td>
	<td><?php echo $employees->gender; ?></td>
	<td><?php echo $employees->hire_date; ?></td>
</tr>
<?php endforeach; ?>

</tbody>
</table>

	<?php if (strlen($pagination)): ?>
	<div>
		Pages: <?php echo $pagination; ?>
	</div>
	
	<?php endif; ?>
	
	</body>
</html>