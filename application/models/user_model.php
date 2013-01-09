<?php
class User_model extends CI_Model {
    function __construct()
    {
       parent::__construct();
       $this->load->database('employees');
    }
 
    function finduser($fname, $lname, $dept, $jobtitle)
    {
	
		
		if((!empty($fname) )&& (empty($lname)) && (empty($dept)) && (empty($jobtitle)) )
		{
		  $db = $this->db->like('first_name',$fname, 'both')
			->limit(100);
        $res = $this->db->get('employees');	
		}
		
		else if((empty($fname) )&& (!empty($lname) ) && (empty($dept)) && (empty($jobtitle)))
		{
		  $db = $this->db->like('last_name',$lname, 'both')
			->limit(100);
        $res = $this->db->get('employees');
		
		}
		
		else if((!empty($fname) )&& (!empty($lname) ) && (empty($dept)) && (empty($jobtitle)))
		{
		  $db = $this->db->like('first_name',$fname, 'both')
				->like('last_name',$lname, 'both')
				->limit(100);
        $res = $this->db->get('employees');
		
		}
		
		
		
		if((!empty($fname)) && (empty($lname)) && (!empty($jobtitle)) && (empty($dept)))
		{
		  $db = $this->db->like('first_name',$fname, 'both')
			->where('t.title', $jobtitle)
			->from('employees AS e')
			->join('titles AS t', 't.emp_no = e.emp_no');
			
			$res = $this->db->get('employees');
		
		}

		
		if((empty($fname)) && (!empty($lname)) && (!empty($jobtitle)) && (empty($dept)))
		{
		  $db = $this->db->like('last_name',$lname, 'both')
			->where('t.title', $jobtitle)
			->from('employees AS e')
			->join('titles AS t', 't.emp_no = e.emp_no');
			
			$res = $this->db->get('employees');
		
		}
		
		
		if((!empty($fname)) && (empty($lname)) && (!empty($jobtitle)) && (!empty($dept)))
		{
		  $db = $this->db->like('title',$jobtitle, 'both')
			->like('title',$jobtitle, 'both')
			->where('t.title', $jobtitle)
			->from('employees AS e')
			->join('titles AS t', 't.emp_no = e.emp_no');
			
			$res = $this->db->get('employees');
		
		}
		
		
		else if((!empty($fname)) && (empty($lname)) && (empty($jobtitle)) && (!empty($dept)))
		{
		  $db = $this->db->like('last_name',$lname, 'both')
			->where('d.dept_no', $dept)
			->from('employees AS e')
			->join('dept_emp as d', 'd.emp_no = e.emp_no');
			
			$res = $this->db->get('employees');
		
		}
		
		$data = $res->result();
        return $data;
    }
}        
            