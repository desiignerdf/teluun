<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teams extends Admin_Controller
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
		$this->load->model('teams_model');

		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg", //'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
			'overwrite' => FALSE,
			'remove_spaces' => TRUE,
			'encrypt_name' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_width' => "6000"
		);
		$this->load->library('upload', $config);
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
			$config["base_url"] = base_url() . "admin/teams";
			$config["total_rows"] = count($this->teams_model->getItems());

			$this->pagination->initialize($config);
			$page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
			$data->items = $this->teams_model->getPagedItems($config["per_page"], $page, $q, 0);
			$data->links = $this->pagination->create_links();

			$data->view = 'admin/teams/list';
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
				$data->view = 'admin/teams/add';
				$this->load->view('layouts/layout-admin', $data);
			} else {
				// set variables from the form
				$name              = $this->input->post('name');
				$status            = $this->input->post('status');
				$display_order     = $this->input->post('display_order');
				$file_id = 0;

				if ($this->upload->do_upload('fileUp')) {
					$file_data = $this->upload->data();
					$file_id = $this->file_model->insert($file_data['file_name'], $file_data['orig_name'], $file_data['file_type'], $file_data['file_size'], $file_data['image_width'], $file_data['image_height']);
				} else {
					//$this->session->set_flashdata('error', $this->upload->display_errors());
				}

				if ($this->teams_model->insert($name, $file_id, $status, $display_order)) {
					$this->session->set_flashdata('success', 'Баг амжилттай нэмлээ.');
				} else {
					$this->session->set_flashdata('error', 'Баг нэмэх үед алдаа гарлаа. Та дахин нэмнэ үү.');
				}
				redirect('admin/teams');
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
				$teams = $this->teams_model->getItemById($id);

				if ($teams) {
					$data->cid = $teams->id;

					$data->file_id = $teams->file_id;
					if ($teams->file_id > 0) {
						$data->file = $this->file_model->getItemById($teams->file_id);
					}

					$data->name = $teams->name;
					$data->status = $teams->status;
					$data->display_order = $teams->display_order;
					// validation not ok, send validation errors to the view
					$data->view = 'admin/teams/edit';
					$this->load->view('layouts/layout-admin', $data);
				} else {
					$this->session->set_flashdata('error', 'Энэ багыг засах боломжгүй байна.');
					redirect('admin/teams');
				}
			} else {
				// set variables from the form
				$cid               = $this->input->post('cid');
				$name              = $this->input->post('name');
				$status            = $this->input->post('status');
				$display_order     = $this->input->post('display_order');

				$file = $_FILES['fileUp'];
				$file_id = $this->input->post('file_id');
				if (trim($file['tmp_name']) != '') {
					if ($this->upload->do_upload('fileUp')) {
						$file_data = $this->upload->data();
						if ($file_id == 0) {
							$file_id = $this->file_model->insert($file_data['file_name'], $file_data['orig_name'], $file_data['file_type'], $file_data['file_size'], $file_data['image_width'], $file_data['image_height']);
						} else {
							$this->file_model->update($file_data['file_name'], $file_data['orig_name'], $file_data['file_type'], $file_data['file_size'], $file_data['image_width'], $file_data['image_height'], $file_id);
						}
					} else {
						//$this->session->set_flashdata('error', $this->upload->display_errors());
					}
				}

				if ($this->teams_model->update($cid, $name, $file_id, $status, $display_order)) {
					$this->session->set_flashdata('success', 'Баг амжилттай заслаа.');
				} else {
					$this->session->set_flashdata('error', 'Баг засах үед алдаа гарлаа. Та дахин засна уу.');
				}
				redirect('admin/teams');
			}
		} else {
			redirect('admin/login');
		}
	}

	public function delete($id)
	{
		if ($this->logged_id()) {
			if ($this->teams_model->delete($id)) {
				$this->session->set_flashdata('success', 'Баг амжилттай устгалаа.');
			} else {
				$this->session->set_flashdata('error', 'Баг устгах үед алдаа гарлаа. Та дахин оролдоно уу.');
			}
			redirect('admin/teams');
		} else {
			redirect('admin/login');
		}
	}
}
