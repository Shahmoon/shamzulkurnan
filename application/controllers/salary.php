<?php
class Salary extends CI_Controller {

	// num of records per page
	private $limit = 5000;
	
	function Salary(){
		parent::__construct();
		
		// load library
		$this->load->library(array('table','validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('salaryModel','',TRUE);
	}
	
	function index($offset = 0){
		// offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$persons = $this->salaryModel->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('salary/index/');
 		$config['total_rows'] = $this->salaryModel->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('emp_no', 'Salary', 'From date','To Date','Actions');
		$i = 0 + $offset;
		foreach ($persons as $person){
			$this->table->add_row($person->emp_no,$person->salary,date('d-m-Y',strtotime($person->from_date)), date('d-m-Y',strtotime($person->to_date)), 
				
				anchor('salary/update/'.$person->emp_no,'update',array('class'=>'update'))
				
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('salaryList', $data);
	}
	
	function update($id){
		// set validation properties
		$this->_set_fields();
		
		// prefill form values
		$person = $this->salaryModel->get_by_id($id)->row();
		$this->validation->emp_no = $person->emp_no;
		$this->validation->salary = $person->salary;
		$this->validation->from_date = date('d-m-Y',strtotime($person->from_date));
		$this->validation->to_date = date('d-m-Y',strtotime($person->to_date));
		
		// set common properties
		$data['title'] = 'Update person';
		$data['message'] = '';
		$data['action'] = site_url('salary/updateSalary');
		$data['link_back'] = anchor('salary/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('salaryEdit', $data);
	}
	
	function updateSalary(){
		// set common properties
		$data['title'] = 'Update person';
		$data['action'] = site_url('salary/updateSalary');
		$data['link_back'] = anchor('salary/index/','Back to list of persons',array('class'=>'back'));
		
		// set validation properties
		$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$id = $this->input->post('salary');
			$person = array('emp_no' => $this->input->post('emp_no'),
							'salary' => $this->input->post('salary'),
							'from_date' => date('Y-m-d', strtotime($this->input->post('from_date'))),
							'to_date' => date('Y-m-d', strtotime($this->input->post('to_date'))));
			$this->salaryModel->update($id,$person);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
		}
		
		// load view
		$this->load->view('salaryEdit', $data);
	}

	
	// validation fields
	function _set_fields(){
		$fields['id'] = 'id';
		$fields['emp_no'] = 'emp_no';
		$fields['salary'] = 'salary';
		$fields['from_date'] = 'from_date';
		$fields['to_date'] = 'to_date';
		
		$this->validation->set_fields($fields);
	}
	
	// validation rules
	function _set_rules(){
		
		$rules['salary'] = 'trim|required';
		$rules['from_date'] = 'trim|required|callback_valid_date';
		$rules['to_date'] = 'trim|required|callback_valid_date';
		
		$this->validation->set_rules($rules);
		
		$this->validation->set_message('required', '* required');
		$this->validation->set_message('isset', '* required');
		$this->validation->set_error_delimiters('<p class="error">', '</p>');
	}
	

}

