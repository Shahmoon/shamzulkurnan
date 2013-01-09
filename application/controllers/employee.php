<?php

class Employee extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper("url");
        $this->load->library("pagination");
	}
		
	function display ($offset=0){
	
		$limit=20;

		$this->load->model('employee_model');
		
		$results = $this->employee_model->search($limit, $offset);
		
		$data['employee'] = $results['rows'];
		$data['num_results'] = $results['num_rows'];
		
		//pagination
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = site_url("employees/display/");
		$config ['total_rows'] = $data['num_results'];
		$config ['per_page'] = $limit;                               
		$config ['uri_segment'] = 3;
		$this->pagination->initialize($config);
		
		$data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('results_view', $data);
	}

	public function add () {
		$emp_no = $this->input->get('emp_no');
		$birth_date = $this->input->get('birth_date');
		$first_name = $this->input->get('first_name');
		$last_name = $this->input->get('last_name');
		$gender = $this->input->get('gender');
		$hire_date = $this->input->get('hire_date');
		$this->load->model('employee_model');
		$addnew = $this->employee_model->create($emp_no,$birth_date,$first_name,$last_name,$gender,$hire_date );
		if($addnew)
		{

			echo "New Employee Added.";
		}
	}
}
