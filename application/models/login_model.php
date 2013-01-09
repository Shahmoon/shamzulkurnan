<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate()
    {
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        
        
        // Run the query
        $query = $this->db->get('users');
        // Let's check if there are any results
       
        if($query->num_rows == 1)
        {
            return true;
        }
      
    }
}
