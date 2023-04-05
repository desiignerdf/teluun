<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Category_model class.
 *
 * @extends CI_Model
 */
class Category_model extends CI_Model
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
		return $this->db->count_all('category');
	}

	public function getItems($q = "", $status = 0, $language_id = 0)
	{
		$this->db->select('category.*, languages.title as language_title,
		COALESCE(translate.title, category.title) as translate_title,
		COALESCE(translate.description, category.description) as translate_description');

		$this->db->from('category');
		$this->db->join('languages', 'languages.id = category.language_id');
		$this->db->join('translate', 'translate.entity_id = category.id');

		if ($status != 0) {
			$this->db->where('category.status', 1);
		}

		if ($q != "") {
			$this->db->like('category.title', $q);
		}

		if ($language_id > 0) {
			$this->db->where('translate.language_id', $language_id);
		}

		$this->db->where('translate.entity_type', 'category');

		$this->db->order_by('category.display_order', "ASC");
		$this->db->order_by('category.id', "DESC");

		$query = $this->db->get();
		return $query->result();
	}

	public function getPagedItems($limit = 15, $start = 0,  $q = "", $status = 0, $language_id = 0)
	{
		$this->db->select('category.*, languages.title as language_title,
		COALESCE(translate.title, category.title) as translate_title,
		COALESCE(translate.description, category.description) as translate_description');

		$this->db->from('category');
		$this->db->join('languages', 'languages.id = category.language_id');
		$this->db->join('translate', 'translate.entity_id = category.id');

		if ($status != 0) {
			$this->db->where('category.status', 1);
		}

		if ($q != "") {
			$this->db->like('category.title', $q);
		}

		if ($language_id > 0) {
			$this->db->where('translate.language_id', $language_id);
		}

		$this->db->where('translate.entity_type', 'category');

		$this->db->order_by('category.display_order', "ASC");
		$this->db->order_by('category.id', "DESC");
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

	public function insert($title, $description, $status, $display_order, $language_id)
	{
		$data = array(
			'title'          => $title,
			'description'    => $description,
			'status'         => $status,
			'display_order'  => $display_order,
			'language_id'    => $language_id,
			'created_at'     => date('Y-m-j H:i:s')
		);

		$this->db->insert('category', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function update($id, $title, $description, $status, $display_order, $language_id)
	{
		$data = array(
			'title'          => $title,
			'description'    => $description,
			'status'         => $status,
			'display_order'  => $display_order,
			'language_id'    => $language_id,
			'updated_at'     => date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		return $this->db->update('category', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('category');
	}

	public function getItemById($id)
	{
		$this->db->from('category');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}
}
