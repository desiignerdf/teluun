<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends User_Controller
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
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('content_model');
	}

	public function index()
	{
		$data = new stdClass();
		$data->page_title = "Уур амьсгалын өөрчлөлт, нүүрстөрөгчийн зах зээлийн хөгжлийн Ололт төв";

		$data->view = "home";
		$this->load->view('layouts/layout', $data);
	}

	public function error404()
	{
		$data = new stdClass();

		$data->page_title = "404";
		$this->load->view('errors/error', $data);
	}
}
