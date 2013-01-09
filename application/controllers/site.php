<?php

class Site extends CI_Controller{

function index()
{

	$this->load->view('includes/template', $data);

}

function search()
{
	$firstname = $this->input->get('firstname');
	$lastname = $this->input->get('lastname');
	$dept = $this->input->get('dept');
	$jobtitle = $this->input->get('jobtitle');

	$this->load->model('site_model');
	$res = $this->site_model->get_records($firstname, $lastname, $dept, $jobtitle);


	$data['rows'] = $res['rows'];
	$data['num_rows'] = $res['num_rows'];
	
	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'search_view';
	$this->load->view('includes/template', $data);
}


function add(){

	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'add_view';
	$this->load->view('includes/template', $data);
}

public function addemp () 
{
		$birth_date = $this->input->get('birth_date');
		$first_name = $this->input->get('first_name');
		$last_name = $this->input->get('last_name');
		$gender = $this->input->get('gender');
		$hire_date = $this->input->get('hire_date');
		$this->load->model('site_model');
		$this->site_model->add_record($birth_date,$first_name,$last_name,$gender,$hire_date);
		$data['addMessage'] = 'Employee Added.';
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['is_logged_in'] = $is_logged_in;
		$data['main_content'] = 'add_view';
		$this->load->view('includes/template', $data);
		
	}

function update()
{

	$emp_no = $this->input->get('emp_no');
	
	if ($emp_no == null)
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['is_logged_in'] = $is_logged_in;
		$data['main_content'] = 'update_view_noemp';
		$this->load->view('includes/template', $data);


	}
	else
	{
		$this->load->model('site_model');
		$res = $this->site_model->getEmployeeData($emp_no);

		$data['rows'] = $res['rows'];
		$data['emp_no'] = $emp_no;

		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['is_logged_in'] = $is_logged_in;
		$data['main_content'] = 'update_view';
		$this->load->view('includes/template', $data);

	}
	

}
function updateemp()
{

	$emp_no = $this->input->get('emp_no');
	$first_name = $this->input->get('first_name');
	$last_name = $this->input->get('last_name');
	$birth_date = $this->input->get('birth_date');
	$gender = $this->input->get('gender');
	$hire_date = $this->input->get('hire_date');
	

	$data = array(
	'first_name'=>$first_name,
	'last_name'=>$last_name,
	'birth_date'=>$birth_date,
	'emp_no'=>$emp_no,
	'gender'=>$gender
	);
	
	$this->load->model('site_model');
	$res = $this->site_model->update_record($data, $emp_no);

	$this->load->model('site_model');
	$res = $this->site_model->getEmployeeData($emp_no);

	$data['rows'] = $res['rows'];
	$data['emp_no'] = $emp_no;
	$data['updateMessage'] = 'Employee Details Updated.';

	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'update_view';
	$this->load->view('includes/template', $data);

}

function delete()
{

	$emp_no = $this->input->get('emp_no');

	$data['emp_no'] = $emp_no;

	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'delete_view';
	$this->load->view('includes/template', $data);
}

function deleteemp()
{
	$emp_no = $this->input->get('emp_no');
	
	$this->load->model('site_model');
	$res = $this->site_model->delete_record($emp_no);
	
	$data['deleteMessage'] = 'Employee Deleted.';

	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'search_form';
	$this->load->view('includes/template', $data);
}

}