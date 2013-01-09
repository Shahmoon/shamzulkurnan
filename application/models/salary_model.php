<?php
class Salary_model extends CI_Model {

// model constructor function
function __construct() {
    parent::__construct(); // call parent constructor
    $this->load->database();
}


public function upsalary($emp_no, $salary) {
    
    $todays_date = date('Y-m-d');
 	$q = $this->db->where('emp_no', $emp_no )
  			    ->where('to_date', '9999-01-01')
				->from('salaries');
	$res = $q->get()->result();

	foreach($res as $employee)
	{
		$old_Salary = $employee->salary;
		$from_date = $employee->from_date;
	}


	$data = array(
		'emp_no' => $emp_no,
		'salary' => $old_Salary,
		'from_date' => $from_date,
		'to_date' => $todays_date
		);

	$q = $this->db->where('emp_no', $emp_no )
  			    ->where('to_date', '9999-01-01')
				->from('salaries');
    $this->db->update($salaries, $data);


    $new_Salary = array('emp_no' => $emp_no,
						'salary' => $salary,
						'from_date' => $todays_date,
						'to_date' => '9999-01-01'	


							);

	$this->db->insert('salaries', $new_Salary);
		
    
    return true;
}
}