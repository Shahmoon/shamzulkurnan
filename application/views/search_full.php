<html>
<head>
	<body>
<style>
		* {
			font-family: Arial;
			font-size: 12px;
		}
		table {
			border-collapse: collapse;
		}
		td, th {
			border: 1px solid #666666;
			padding:  4px;
		}
		div {
			margin: 4px;
		}

		label {
			display: inline-block;
			width: 120px;
		}
		.search tr:nth-child(odd) {
			background:#C4B0B7;
		}
	</style>

<div id="menuContainer">

</div>

<center>
	
<?php include_once("menu_template.php") ?>
<table class="table search">

<form class="form-horizontal" form action="searchFull" method="GET" >

<div class="hero-unit">
	
	
	 
	 <legend>Enter Your Search</legend>

	<label >Employee No</label>
	<input type= "text" name="emp_no"></br>

	<label >First name</label>
    <input type= "text" name="first_name"></br>
		
	<label >Last name</label>
    <input type= "text" name="last_name"></br>

	<label>Gender</label>
	<input type="radio" name="sex" value="male">Male
	</br>
	<label>Gender</label>
	<input type="radio" name="sex" value="female">Female
	</br>

	<label>Hire Date</label>
	<input type= "text" name="hire_date"></br>

	<label>Title</label>
	<input type= "text" name="title"></br>

	<label >Departments</label>
	<select name="dept_no">
	
<option value="d009" selected="d009">Customer Service</option>
<option value="d005" selected="d005">Development</option>
<option value="d002" selected="d002">Finance</option>
<option value="d003" selected="d003">Human Resources</option>
<option value="d001" selected="d001">Marketing</option>
<option value="d004" selected="d004">Production</option>
<option value="d006" selected="d006">Quality Management</option>
<option value="d008" selected="d008">Research</option>
<option value="d007" selected="d007">Sales</option>
	<option value="" selected="">Select</option>
</select>
</br>
	<label>Salary</label>
	<input type= "text" name="salary"></br>



<div class="control-group">
	  	<div class="controls"> 
  <button type="submit"  class="btn btn-inverse" >Search</button>
</div></div>


	
</form>
</div>

	

            	<thead>
                		<th>Employee_No</th>
                        <th>First_name</th>
                        <th>Last_name</th>
                        <th>Gender</th>
                        <th>Hire_date</th>
                        <th>Dept_no</th>
                		<th>Title</th>
                		<th>Salary</th>

                	
                        
                        
                </thead>
                <tbody>
                	<?php if (isset($query) && (count($query) > 0)) : ?>
                	<?php foreach($query as $employee): ?>

                    <tr>
                    	<td> <?php echo($employee->emp_no); ?></td>
                        <td> <?php echo($employee->first_name); ?></td>
                        <td> <?php echo($employee->last_name); ?></td>
                        <td> <?php echo($employee->gender); ?></td>
                        <td> <?php echo($employee->hire_date); ?></td>
                        <td> <?php echo($employee->dept_no); ?></td>
                        <td> <?php echo($employee->title); ?></td>
                        <td> <?php echo($employee->salary); ?></td>
                    </tr>   
					<?php endforeach; ?>
					<?php endif;?>
                </tbody>
                
                </table>
</center>

                
 <br/>     
                
</body>
</html>

