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
		$this->load->model('category_model');
		$this->load->model('competition_model');
		$this->load->model('competition_category_model');
		$this->load->model('teams_model');
	}

	public function index()
	{
		$data = new stdClass();
		$data->page_title = "Sport";

		$data->items = $this->competition_model->getPagedItems(6, 0, 0, 1);
		$data->headercontent = $this->content_model->getPagedItems(1, 0, 0, "", 1);
		$data->content = $this->content_model->getPagedItems(6, 0, 0, "", 1);

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
