<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content extends Admin_Controller
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
		$this->load->model('category_model');
		$this->load->model('language_model');
		$this->load->model('translate_model');

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
			$category_id = 0;
			if (isset($_GET['c'])) {
				$category_id = $_GET['c'];
			}

			$is_featured = 0;
			if (isset($_GET['f'])) {
				$is_featured = $_GET['f'];
			}

			$q = '';
			if (isset($_GET['q'])) {
				$q = $_GET['q'];
			}

			$data->category_id = $category_id;
			$data->is_featured = $is_featured;
			$data->q = $q;

			$config = array();
			$config["per_page"] = 15;
			$config["uri_segment"] = 3;
			$config["base_url"] = base_url("admin/content");
			$config['reuse_query_string'] = TRUE;
			$config["total_rows"] = count($this->content_model->getItems(0, 0, "", 0, 1));
			$config['query_string_segment'] = "page";
			$this->pagination->initialize($config);

			$page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;

			$language = $this->language_model->getDefaultLanguage();

			$data->categories = $this->category_model->getItems("", 1, 1);
			$data->items = $this->content_model->getPagedItems($config["per_page"], $page, $category_id, $is_featured, $q, 0, $language->id);
			$data->links = $this->pagination->create_links();

			$data->page = $page;
			$data->view = 'admin/content/list';
			$this->load->view('layouts/layout-admin', $data);
		} else {
			redirect('admin/login');
		}
	}

	public function add()
	{
		$data = new stdClass();

		if ($this->logged_id()) {
			// load form helper and validation library
			$this->load->helper('form');
			$this->load->library('form_validation');

			// set validation rules
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			if ($this->form_validation->run() === false) {
				// validation not ok, send validation errors to the view
				$data->categories = $this->category_model->getItems("", 1, 1);
				$data->languages = $this->language_model->getAllLanguages();


				$data->view = 'admin/content/add';
				$this->load->view('layouts/layout-admin', $data);
			} else {
				// set variables from the form
				$category_id = $this->input->post('category');
				$title = $this->input->post('title');
				$description = $this->input->post('description');
				$video = $this->input->post('video');
				$content = $this->input->post('content');
				$status = $this->input->post('status');
				$published_at = $this->input->post('published_at');
				$is_featured = $this->input->post('is_featured');
				$show_image = $this->input->post('show_image');
				$display_order = $this->input->post('display_order');
				$file_id = 0;

				if ($this->upload->do_upload('fileUp')) {
					$file_data = $this->upload->data();
					$file_id = $this->file_model->insert($file_data['file_name'], $file_data['orig_name'], $file_data['file_type'], $file_data['file_size'], $file_data['image_width'], $file_data['image_height']);
				} else {
					//$this->session->set_flashdata('error', $this->upload->display_errors());
				}
				$languages = $this->language_model->getAllLanguages();

				$i = 0;
				$content_id = 0;
				foreach ($languages as $language) {
					$i++;
					$title = $this->input->post('title' . $language->id . '');
					$description = $this->input->post('description' . $language->id . '');
					$content = $this->input->post('content' . $language->id . '');

					if ($i == 1) {
						$content_id = $this->content_model->insert($title, $description, $content, $status, $category_id, $file_id, $is_featured, $video, $published_at, $show_image, $display_order, $language->id);
						$this->translate_model->insert($title, $description, $content, null, $content_id, 'content', $language->id);
					} else {
						$this->translate_model->insert($title, $description, $content, null, $content_id, 'content', $language->id);
					}
					$this->session->set_flashdata('success', 'Мэдээ амжилттай нэмлээ.');
				}
				redirect('admin/content');
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
			if ($this->form_validation->run() === false) {
				$data->categories = $this->category_model->getItems("", 1, 1);
				$data->languages = $this->language_model->getAllLanguages();
				$content = $this->content_model->getItemById($id);

				if ($content) {
					$data->cid = $content->id;
					$data->category_id = $content->category_id;
					$data->language_id = $content->language_id;
					$data->translates = $this->translate_model->getTranslates($content->id, 'content');

					$data->file_id = $content->file_id;
					if ($content->file_id > 0) {
						$data->file = $this->file_model->getItemById($content->file_id);
					}

					$data->title = $content->title;
					$data->description = $content->description;
					$data->video = $content->video;
					$data->content = $content->content;
					$data->status = $content->status;
					$data->published_at = $content->published_at;
					$data->is_featured = $content->is_featured;
					$data->show_image = $content->show_image;
					$data->display_order = $content->display_order;

					// validation not ok, send validation errors to the view
					$data->view = 'admin/content/edit';
					$this->load->view('layouts/layout-admin', $data);
				} else {
					$this->session->set_flashdata('error', 'Энэ мэдээллийг засах боломжгүй байна.');
					redirect('admin/content');
				}
			} else {
				// set variables from the form
				$cid = $this->input->post('cid');
				$category_id = $this->input->post('category');
				$title = $this->input->post('title');
				$description = $this->input->post('description');
				$video = $this->input->post('video');
				$content = $this->input->post('content');
				$status = $this->input->post('status');
				$published_at    = $this->input->post('published_at');
				$is_featured    = $this->input->post('is_featured');
				$show_image = $this->input->post('show_image');
				$display_order = $this->input->post('display_order');

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

				$languages = $this->language_model->getAllLanguages();

				$i = 0;
				foreach ($languages as $language) {
					$i++;
					$tid = $this->input->post('tid' . $language->id . '');
					$title = $this->input->post('title' . $language->id . '');
					$description = $this->input->post('description' . $language->id . '');
					$content = $this->input->post('content' . $language->id . '');

					if ($i == 1) {
						$this->content_model->update($cid, $title, $description, $content, $status, $category_id, $file_id, $is_featured, $video, $published_at, $show_image, $display_order, $language->id);
						$this->translate_model->update($title, $description, $content, null, $cid, 'content', $language->id, $tid);
					} else {
						$this->translate_model->update($title, $description, $content, null, $cid, 'content', $language->id, $tid);
					}

					$this->session->set_flashdata('success', 'Мэдээ амжилттай хадгаллаа');
				}
				redirect('admin/content');
			}
		} else {
			redirect('admin/login');
		}
	}

	public function delete($id)
	{
		if ($this->logged_id()) {
			$content = $this->content_model->getItemById($id);

			$this->translate_model->delete($content->id, 'content');
			$this->file_model->delete($content->file_id);

			if ($this->content_model->delete($id)) {
				$this->session->set_flashdata('success', 'Мэдээ амжилттай устгалаа.');
			} else {
				$this->session->set_flashdata('error', 'Мэдээ устгах үед алдаа гарлаа. Та дахин оролдоно уу.');
			}
			redirect('admin/content');
		} else {
			redirect('admin/login');
		}
	}

	public function upload()
	{
		$resp = '';
		$resp_mes = '';
		if (isset($_FILES["file"]["type"])) {
			$photo = $_FILES["file"];
			if (!empty($photo) && $photo["size"] > 0) {
				if ($this->upload->do_upload('file')) {
					$file_data = $this->upload->data();
					$resp = base_url('uploads/' . $file_data['file_name']);
					$resp_mes = 'ok';
				} else {
					$resp_mes = 'Энэ зургийг хуулж чадсангүй. Та дахин оролдоно уу.';
				}
			}
		} else {
			$resp_mes = 'Зургаа сонгоно уу!';
		}
		echo json_encode(array('response' => $resp, 'message' => $resp_mes));
	}
}
