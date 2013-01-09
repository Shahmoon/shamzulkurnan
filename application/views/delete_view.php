Are you sure you want to delete <?php echo $emp_no; ?> ?

<form method="get" action="<?php echo base_url() . 'index.php/site/deleteemp'; ?>">
<input type="submit" value="Delete" />
<input type="hidden" id="emp_no" value="<?php echo $emp_no; ?>" name="emp_no"/>
</form>