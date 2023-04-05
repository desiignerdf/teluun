<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content extends User_Controller
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
		$this->load->model('file_model');
	}

	public function index($id)
	{
		$data = new stdClass();

		$q = "";

		if (isset($_GET['q'])) {
			$q = $_GET['q'];
		}

		$data->category_id = $id;
		$data->q = $q;

		$config = array();
		$config['per_page'] = 9;
		$config["uri_segment"] = 3;
		$config["base_url"] = base_url("content/" . $id);
		$config['reuse_query_string'] = TRUE;
		$config["total_rows"] = count($this->contents_model->getItems($id, 0, $q, 1, $language_id));
		$config['query_string_segment'] = 'page';
		$config['full_tag_open'] = '<ul class="page-nav list-style">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = '<i class="flaticon-left-arrow"></i>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '<i class="flaticon-right-arrow"></i>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '<i class="flaticon-right-arrow"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<i class="flaticon-left-arrow"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="active">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;

		$data->items = $this->contents_model->getPagedItems($config["per_page"], $page, $id, 0, $q, 1, $language_id);
		$data->featuredItems = $this->contents_model->getPagedItems(5, 0, $id, 0, "", 1, $language_id);

		$data->links = $this->pagination->create_links();

		$data->page_title = 'Мэдээ';
		$data->page = $page;

		$data->view = 'content';
		$this->load->view('layouts/layout', $data);
	}

	public function detail($id)
	{
		$data = new stdClass();

		$item = $this->contents_model->getItemById($id);
		$data->latestItems = $this->contents_model->getPagedItems(4, 0, $item->category_id, 0, "", 1, $language_id);

		$data->page_id = $item->id;
		$data->page_title = $item->title;
		$data->category_title = $item->category_title;
		$data->file_id = $item->file_id;
		$data->category_id = $item->category_id;
		$data->page_description = $item->description;
		$data->page_content = $item->content;
		$data->page_date = $item->published_at;

		$data->page_img = $this->getImageNull($item->file_id);
		$data->page_url = base_url('/content/detail/' . $item->id);

		$data->view = "content-detail";
		$this->load->view('layouts/layout', $data);
	}
}
