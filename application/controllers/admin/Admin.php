<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Admin_Controller
{
	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('content_model');
		$this->load->model('user_model');
	}

	public function index()
	{
		redirect('admin/dashboard');
	}

	public function dashboard()
	{
		if ($this->logged_id()) {
			$data = new stdClass();
			$data->title = "Хянах самбар";

			$data->view = 'admin/dashboard';
			$this->load->view('layouts/layout-admin', $data);
		} else {
			redirect('admin/login');
		}
	}

	public function login()
	{
		$data = new stdClass();
		$data->title = "Нэвтрэх";
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			// validation not ok, send validation errors to the view
			$this->load->view('admin/login', $data);
		} else {

			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($this->user_model->user_login($username, $password)) {
				$user_id = $this->user_model->get_user_id_from_username($username);
				$user    = $this->user_model->get_user($user_id);
				// set session user datas
				$_SESSION['cccmdc_user_id']       = (int)$user->id;
				$_SESSION['cccmdc_firstname']     = (string)$user->firstname;
				$_SESSION['cccmdc_lastname']      = (string)$user->lastname;
				$_SESSION['logged_in']            = (bool)true;
				redirect('admin/dashboard');
			} else {
				$data->error = 'Хэрэглэгчийн нэр эсвэл нууц үг буруу';
				$this->load->view('admin/login', $data);
			}
		}
	}

	public function logout()
	{
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			redirect('admin/login');
		} else {
			redirect('/');
		}
	}
}
