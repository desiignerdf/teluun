<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends Admin_Controller
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
		$this->load->model('category_model');
	}

	public function index()
	{
		$data = new stdClass();

		if ($this->logged_id()) {
			$q = '';
			if (isset($_GET['q'])) {
				$q = $_GET['q'];
			}

			$data->q = $q;

			$config = array();
			$config['per_page'] = 100;
			$config["uri_segment"] = 3;
			$config["base_url"] = base_url() . "admin/category";
			$config["total_rows"] = count($this->category_model->getItems());

			$this->pagination->initialize($config);
			$page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
			$data->items = $this->category_model->getPagedItems($config["per_page"], $page, $q, 0);
			$data->links = $this->pagination->create_links();

			$data->view = 'admin/category/list';
			$this->load->view('layouts/layout-admin', $data);
		} else {
			redirect('admin/login');
		}
	}

	public function add()
	{
		$data = new stdClass();

		if ($this->logged_id()) {
			$this->load->helper('form');
			$this->load->library('form_validation');

			// set validation rules
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_rules('display_order', 'Display Order', 'trim|required|numeric');
			if ($this->form_validation->run() === false) {
				// validation not ok, send validation errors to the view
				$data->view = 'admin/category/add';
				$this->load->view('layouts/layout-admin', $data);
			} else {
				// set variables from the form
				$title             = $this->input->post('title');
				$description       = $this->input->post('description');
				$status            = $this->input->post('status');
				$display_order     = $this->input->post('display_order');

				if ($this->category_model->insert($title, $description, $status, $display_order)) {
					$this->session->set_flashdata('success', 'Ангилал амжилттай нэмлээ.');
				} else {
					$this->session->set_flashdata('error', 'Ангилал нэмэх үед алдаа гарлаа. Та дахин нэмнэ үү.');
				}
				redirect('admin/category');
			}
		} else {
			redirect('admin/login');
		}
	}

	public function edit($id)
	{
		$data = new stdClass();

		if ($this->logged_id()) {
			// load form helper and validation library
			$this->load->helper('form');
			$this->load->library('form_validation');

			// set validation rules
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_rules('display_order', 'Display Order', 'trim|required|numeric');
			if ($this->form_validation->run() === false) {
				$category = $this->category_model->getItemById($id);

				if ($category) {
					$data->cid = $category->id;
					$data->title = $category->title;
					$data->description = $category->description;
					$data->status = $category->status;
					$data->display_order = $category->display_order;
					// validation not ok, send validation errors to the view
					$data->view = 'admin/category/edit';
					$this->load->view('layouts/layout-admin', $data);
				} else {
					$this->session->set_flashdata('error', 'Энэ ангилалыг засах боломжгүй байна.');
					redirect('admin/category');
				}
			} else {
				// set variables from the form
				$cid               = $this->input->post('cid');
				$title              = $this->input->post('title');
				$description       = $this->input->post('description');
				$status            = $this->input->post('status');
				$display_order     = $this->input->post('display_order');;

				if ($this->category_model->update($id, $title, $description, $status, $display_order)) {
					$this->session->set_flashdata('success', 'Ангилал амжилттай заслаа.');
				} else {
					$this->session->set_flashdata('error', 'Ангилал засах үед алдаа гарлаа. Та дахин засна уу.');
				}
				redirect('admin/category');
			}
		} else {
			redirect('admin/login');
		}
	}

	public function delete($id)
	{
		if ($this->logged_id()) {
			if ($this->category_model->delete($id)) {
				$this->session->set_flashdata('success', 'Ангилал амжилттай устгалаа.');
			} else {
				$this->session->set_flashdata('error', 'Ангилал устгах үед алдаа гарлаа. Та дахин оролдоно уу.');
			}
			redirect('admin/category');
		} else {
			redirect('admin/login');
		}
	}
}
