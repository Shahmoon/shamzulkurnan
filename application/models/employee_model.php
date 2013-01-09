<?php
class Employee_model extends CI_Model {

function __construct ()
		{
		parent ::__construct();
		$this->load->database();
		}

	function search ($limit, $offset)
	{
			 
			//results
			$q = $this->db->select('emp_no, birth_date,first_name,last_name, gender, hire_date')
				->from ('employees')
				->limit($limit, $offset);
				
				
				 
			$ret['rows'] = $q->get()->result();
				
			//count
			$q = $this->db->select('COUNT(*) as count', FALSE)
				->from('employees');
				
				$tmp =$q->get()->result();
				$ret['num_rows'] = $tmp[0]->count;
				
				return $ret;
	}
				
				
				function create ($emp_no,$birth_date,$first_name,$last_name,$gender,$hire_date)
				{
				$this->db->set('emp_no',$emp_no);
				$this->db->set('birth_date',$birth_date);
				$this->db->set('first_name',$first_name);
				$this->db->set('last_name',$last_name);
				$this->db->set('gender',$gender);
				$this->db->set('hire_date',$hire_date);
				$query = $this ->db ->insert('employees');
				return true;
				
				}
}