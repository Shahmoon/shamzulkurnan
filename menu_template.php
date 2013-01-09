<?php
$this->load->helper('url');
$index = "myButtons";
$userlogin = "myButtons";
$register = "myButtons";
$remove = "myButtons";
$accounts = "myButtons";

$menuLinkid = basename($_SERVER['PHP_SELF'], ".php");
if ($menuLinkid == "index"){
		$index = 'myActiveButton';
} else if ($menuLinkid == "userlogin"){
	$index = 'myActiveButton';
} else if ($menuLinkid == "register"){
	$index = 'myActiveButton';
} else if ($menuLinkid == "remove"){
	$index = 'myActiveButton';
} else if ($menuLinkid == "accounts"){
	$index = 'myActiveButton';
}
?>
<a class="<?php echo $index; ?>" href="<?php echo site_url('hr/') ?>">Home</a>
<a class="<?php echo $index; ?>" href="<?php echo site_url('search/searchFull') ?>">Search</a>
<a class="<?php echo $index; ?>" href="<?php echo site_url('hr/addPerson') ?>">Add Employee</a>
<a class="<?php echo $index; ?>" href="<?php echo site_url('hr/updep') ?>">Change Title</a>
<a class="<?php echo $index; ?>" href="<?php echo site_url('hr/updept') ?>">Change Department</a>
<a class="<?php echo $index; ?>" href="<?php echo site_url('hr/upsalary') ?>">Update Salary</a>
<a class="<?php echo $index; ?>" href="<?php echo site_url('hr/deleteMan') ?>">Remove Manager</a>
<a class="<?php echo $index; ?>" href="<?php echo site_url('auth/logout') ?>">log Out </a>