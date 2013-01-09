<html>
<head>

<body>
<form action="http://localhost/ecwm604/index.php/person/updtitle" method="POST">
employee id: 
<input type=text name="id"><br />
change title to: 
<select name="title">
<option value="Assistant Engineer">Assistant Engineer</option>
<option value="Engineer">Engineer</option>
<option value="Senior Engineer">Senior Engineer</option>
<option value="Senior Staff">Senior Staff</option>
<option value="Staff">Staff</option> 
</select><br />
<input type="submit" value="submit"/>
<br />
<?php

//echo $data['title'];
?>

</body>
</html>