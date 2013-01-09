<?php if(isset($addMessage)){echo $addMessage;} ?>

<form action = "/index.php/site/addemp" method = "get">


Birth Date: 	<input type = "text" id ="birth_date" name="birth_date"><br/>

First Name:		<input type = "text" id ="first_name" name="first_name"><br/>

Last Name: 		<input type = "text" id ="last_name" name="last_name"><br/>

Gender: 		<input type = "text" id ="gender" name="gender"><br/>

Hire Date: 		<input type = "text" id ="hire_date" name="hire_date"><br/>

<br/>
<input type ="submit" value="submit">
</form>

