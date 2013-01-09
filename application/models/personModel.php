<?php
class PersonModel extends CI_Model {
	
	
	private $employees= 'employees';
	
	function Person(){
		parent::Model();
	}
	
	function list_all(){
		$this->db->order_by('emp_no','asc');
		return $this->db->get($employees);
	}
	
	function count_all(){
		return $this->db->count_all($this->employees);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('emp_no','asc');
		return $this->db->get($this->employees, $limit, $offset);
	}
	
	function get_by_id($id){
		$this->db->where('emp_no', $id);
		return $this->db->get($this->employees);
	}
	
	function save($person){
		$this->db->insert('employees', $person);
		return $this->db->insert_id();
	}
	
	function update($id, $person){
		$this->db->where('emp_no', $id);
		$this->db->update($this->employees, $person);
	}
	
	function delete($id){
		$this->db->where('emp_no', $id);
		$this->db->delete($this->employees);
	}
	function promoMan($emp_no,$dept_no){
		$today = date('Y-m-d');
		$this->db->set('dept_no', $dept_no);
		$this->db->set('emp_no', $emp_no);
		$this->db->set('from_date', $today);
		$this->db->set('to_date', '9999-01-01');
		$query = $this->db->insert('dept_manager');
		
	}

		
}