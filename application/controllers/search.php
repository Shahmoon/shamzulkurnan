<?php
 class Search extends CI_controller{
    

 function searchEmployee(){

        $limit =100;
        $emp_no = $this->input->get('emp_no');
        $last_name = $this->input->get('last_name');
        $title =$this->input->get('title');
        $dept_no =$this->input->get('dept_no');
        
        $this->load->model('search_model');
        
        if (empty($emp_no) && empty($last_name) && empty($title) && empty($dept_no)) {
            $data = ('');
        } else {
        $data['query'] = $this->search_model->searchEmployee($emp_no,$last_name,$title,$dept_no,$limit);
        }
        echo json_encode($data);
        $this->load->view('search_form', $data);
    }

 
 function searchFull(){

        $limit =100;
        $emp_no = $this->input->get('emp_no');
        $first_name = $this->input->get('first_name');
        $last_name = $this->input->get('last_name');
        $gender = $this->input->get('gender');
        $hire_date = $this->input->get('hire_date');
        $title =$this->input->get('title');
        $dept_no =$this->input->get('dept_no');
        $salary = $this->input->get('salary');
        
        $this->load->model('search_model');
        
        if (empty($emp_no) && empty($first_name) && empty($last_name) && empty($gender) && empty($hire_date) && empty($title) && empty($dept_no) && empty($salary)) {
            $data = ('');
        } else {
        $data['query'] = $this->search_model->searchFull($emp_no,$first_name,$last_name,$gender,$hire_date,$title,$dept_no,$salary,$limit);
        }
        echo json_encode($data);
        $this->load->view('search_full', $data);
    }

}