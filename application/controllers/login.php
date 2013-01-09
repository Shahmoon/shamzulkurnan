<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct() {
		parent::__construct();
		$this->load->model('login_model');
	}
	
	public function index()
	{
		$data['main_content'] = 'login_view';
		$this->load->view('login_view');
	}

	public function validate_credentials()
	{
		
		$this->load->model('login_model');
		$query = $this->login_model->validate();

		if ($query) // if the user's credentials validated...
		{
			$data = array(
				'username' => $this ->input->post('username'),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect ('site/');
		}
		else
		{
			$this->index();
		}

		
	}

	public function logout()
	{

		$this->session->sess_destroy();
		redirect('site/');


	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

