<?php
class UpdateDept extends CI_Model {

    function __construct() {
    parent::__construct(); // call parent constructor
    $this->load->database();
}


public function upedit($emp_no, $dept_no) {
    
    $todays_date = date('Y-m-d');
    $q = $this->db->where('emp_no', $emp_no )
                ->where('to_date', '9999-01-01')
                ->from('dept_emp');
    $res = $q->get()->result();

    foreach($res as $employee)
    {
        $old_deptno = $employee->dept_no;
        $from_date = $employee->from_date;
    }


    $data = array(
        'emp_no' => $emp_no,
        'dept_no' => $old_deptno,
        'from_date' => $from_date,
        'to_date' => $todays_date
        );

    $q = $this->db->where('emp_no', $emp_no )
                ->where('to_date', '9999-01-01')
                ->from('dept_emp');
    $this->db->update($dept_emp, $data);


    $new_deptno = array('emp_no' => $emp_no,
                        'dept_no' => $dept_no,
                        'from_date' => $todays_date,
                        'to_date' => '9999-01-01'   
                            );

    $this->db->insert('dept_emp', $new_deptno);
        
    
    return true;
}
}