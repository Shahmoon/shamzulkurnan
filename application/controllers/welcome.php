<?php
class Welcome extends CI_Controller {
    public function index()
    {
    $this->load->library('authlib');
    $loggedin = $this->authlib->is_loggedin();
 
    if ($loggedin === false) {
        $this->load->helper('url');
        redirect('/auth/login');
 
    }
            $this->load->view('homepage',array('name' => $loggedin));
    }
}