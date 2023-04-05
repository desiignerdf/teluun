<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Content_model class.
 *
 * @extends CI_Model
 */
class Content_model extends CI_Model
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
		$this->load->database();
	}

	public function record_count()
	{
		return $this->db->count_all("content");
	}

	public function getItems($category_id = 0, $is_featured = 0, $q = "", $status = 0, $language_id = 0)
	{
		$this->db->select('content.*, category.title as category_title, category.id as category_id, languages.title as language_title,
		COALESCE(translate.title, content.title) as translate_title,
		COALESCE(translate.description, content.description) as translate_description,
		COALESCE(translate.content, content.content) as translate_content');

		$this->db->from('content');
		$this->db->join('category', 'category.id = content.category_id');
		$this->db->join('languages', 'languages.id = content.language_id');
		$this->db->join('translate', 'translate.entity_id = content.id');

		if ($category_id != 0) {
			$this->db->where('content.category_id', $category_id);
		}

		if ($is_featured != 0) {
			$this->db->where('content.is_featured', 1);
		}

		if ($status != 0) {
			$this->db->where('content.status', 1);
		}

		$this->db->where('translate.entity_type', 'content');
		$this->db->where('content.type', 'content');

		if ($q != "") {
			$this->db->like('translate.title', $q);
		}

		if ($language_id > 0) {
			$this->db->where('translate.language_id', $language_id);
		}

		$this->db->order_by('content.display_order', 'ASC');
		$this->db->order_by('content.published_at', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}

	public function getPagedItems($limit = 50, $start = 0, $category_id = 0, $is_featured = 0, $q = "", $status = 0, $language_id = 0)
	{
		$this->db->select('content.*, category.title as category_title, category.id as category_id, languages.title as language_title,
		COALESCE(translate.title, content.title) as translate_title,
		COALESCE(translate.description, content.description) as translate_description,
		COALESCE(translate.content, content.content) as translate_content');

		$this->db->from('content');
		$this->db->join('category', 'category.id = content.category_id');
		$this->db->join('languages', 'languages.id = content.language_id');
		$this->db->join('translate', 'translate.entity_id = content.id');

		if ($category_id != 0) {
			$this->db->where('content.category_id', $category_id);
		}

		if ($is_featured != 0) {
			$this->db->where('content.is_featured', 1);
		}

		if ($status != 0) {
			$this->db->where('content.status', 1);
		}

		$this->db->where('translate.entity_type', 'content');
		$this->db->where('content.type', 'content');

		if ($q != "") {
			$this->db->like('translate.title', $q);
		}

		if ($language_id > 0) {
			$this->db->where('translate.language_id', $language_id);
		}

		$this->db->order_by('content.display_order', 'ASC');
		$this->db->order_by('content.published_at', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	public function insert($title, $description, $content, $status, $category_id, $file_id, $is_featured, $video, $published_at, $show_image, $display_order, $language_id)
	{
		$data = array(
			'category_id'   => $category_id,
			'file_id'		=> $file_id,
			'title'         => $title,
			'description'   => $description,
			'video'         => $video,
			'content' 	    => $content,
			'type'   	    => "content",
			'status'        => $status,
			'is_featured'   => $is_featured,
			'published_at'  => $published_at,
			'show_image'    => $show_image,
			'display_order' => $display_order,
			'language_id'   => $language_id,
			'created_at'    => date('Y-m-j H:i:s')
		);

		$this->db->insert('content', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function update($cid, $title, $description, $content, $status, $category_id, $file_id, $is_featured, $video, $published_at, $show_image, $display_order, $language_id)
	{
		$data = array(
			'category_id'   => $category_id,
			'file_id' 		=> $file_id,
			'title'         => $title,
			'description'   => $description,
			'video'         => $video,
			'content' 	    => $content,
			'status'        => $status,
			'is_featured'   => $is_featured,
			'published_at'  => $published_at,
			'show_image'    => $show_image,
			'display_order' => $display_order,
			'language_id'   => $language_id,
			'updated_at'    => date('Y-m-d H:i:s')
		);

		$this->db->where('id', $cid);
		return $this->db->update('content', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);

		return $this->db->delete('content');
	}

	public function getItemById($id)
	{
		$this->db->select('content.*, category.title as category_title, category.id as category_id');
		$this->db->from('content');
		$this->db->join('category', 'category.id = content.category_id');

		$this->db->where('content.id', $id);

		return $this->db->get()->row();
	}
}
