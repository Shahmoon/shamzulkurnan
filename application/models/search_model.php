<?php
class search_model extends CI_Model {


	function __construct(){
		
		parent::__construct();
		$this->load->database();
		}
	

function searchEmployee($emp_no,$last_name,$title,$dept_no,$limit){
			


			
		    $this->db->select('*');
		    $this->db->from('employees');
			$this->db->join('dept_emp','employees.emp_no = dept_emp.emp_no');
			$this->db->join('titles','dept_emp.emp_no = titles.emp_no');
			$this->db->join('salaries', 'dept_emp.emp_no = salaries.emp_no');
			$this->db->join('departments', 'dept_emp.dept_no = departments.dept_no');
			$this->db->where('titles.to_date', '9999-01-01' );
			$this->db->where('salaries.to_date', '9999-01-01' );
			$this->db->limit($limit);
				
	
			if(!empty($emp_no))
			
			{
				
				$this->db->where('employees.emp_no',$emp_no);
				
			}
			
			if(!empty($last_name))
			
			{
				
				$this->db->where('employees.last_name',$last_name);
				
			}
			
			
			if(!empty($title))
			
			{
				
				$this->db->where('titles.title',$title);
				
			}
			
			
			if(!empty($dept_no))
			
			{
				
				$this->db->where('dept_emp.dept_no',$dept_no);
				
			}
			
			
			$query = $this->db->get();
			return $query->result();
			
	
	}
	
	function searchFull($emp_no,$first_name,$last_name,$gender,$hire_date,$title,$dept_no,$salary,$limit){
			


			
		    $this->db->select('*');
		    $this->db->from('employees');
			$this->db->join('dept_emp','employees.emp_no = dept_emp.emp_no');
			$this->db->join('titles','dept_emp.emp_no = titles.emp_no');
			$this->db->join('salaries', 'dept_emp.emp_no = salaries.emp_no');
			$this->db->join('departments', 'dept_emp.dept_no = departments.dept_no');
			$this->db->where('titles.to_date', '9999-01-01' );
			$this->db->where('salaries.to_date', '9999-01-01' );
			$this->db->limit($limit);
				
	
			if(!empty($emp_no))
			
			{
				
				$this->db->where('employees.emp_no',$emp_no);
				
			}

			if(!empty($first_name))
			
			{
				
				$this->db->where('employees.first_name',$first_name);
				
			}
			
			if(!empty($last_name))
			
			{
				
				$this->db->where('employees.last_name',$last_name);
				
			}
			
			if(!empty($gender))
			
			{
				
				$this->db->where('employees.gender',$gender);
				
			}
			
			if(!empty($hire_date))
			
			{
				
				$this->db->where('employees.hire_date',$hire_date);
				
			}
			if(!empty($title))
			
			{
				
				$this->db->where('titles.title',$title);
				
			}
			
			
			if(!empty($dept_no))
			
			{
				
				$this->db->where('dept_emp.dept_no',$dept_no);
				
			}
			
			if(!empty($salary))
			
			{
				
				$this->db->where('salaries.salary',$salary);
				
			}
			
			$query = $this->db->get();
			return $query->result();
			
	
	}
	
	
	
}
