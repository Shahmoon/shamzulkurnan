<?php

	class Site_model extends CI_Model{

	function get_records ($firstname, $lastname, $dept, $jobtitle)

{

	$query = $this->db->like('first_name', $firstname)
			->from('employees');

	$res['rows'] = $query->get()->result();
	$res['num_rows'] = count($res['rows']);

	return $res;

}

function getEmployeeData($emp_no)
{

	$query = $this->db->where('emp_no', $emp_no)
			->from('employees');

	$res['rows'] = $query->get()->result();
 
	return $res;


}

	function add_record($birth_date,$first_name,$last_name,$gender,$hire_date)
{
				$this->db->set('birth_date',$birth_date);
				$this->db->set('first_name',$first_name);
				$this->db->set('last_name',$last_name);
				$this->db->set('gender',$gender);
				$this->db->set('hire_date',$hire_date);
				$query = $this ->db ->insert('employees');
				return true;
}
	

	function update_record($data, $emp_no)
{

	$this->db->where('emp_no', $emp_no);
	$this->db->update('employees', $data);
}

	function delete_record($emp_no)
{

	$this->db->where('emp_no', $emp_no);
	$this->db->delete('employees');

}

}