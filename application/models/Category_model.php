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

	public function getItems($q = "", $status = 0)
	{
		$this->db->select('*');
		$this->db->from('category');

		if ($status != 0) {
			$this->db->where('status', 1);
		}

		if ($q != "") {
			$this->db->like('title', $q);
		}

		$this->db->order_by('display_order', "ASC");
		$this->db->order_by('id', "DESC");

		$query = $this->db->get();
		return $query->result();
	}

	public function getPagedItems($limit = 15, $start = 0,  $q = "", $status = 0)
	{
		$this->db->select('*');
		$this->db->from('category');

		if ($status != 0) {
			$this->db->where('status', 1);
		}

		if ($q != "") {
			$this->db->like('title', $q);
		}

		$this->db->order_by('display_order', "ASC");
		$this->db->order_by('id', "DESC");
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

	public function insert($title, $description, $status, $display_order)
	{
		$data = array(
			'title'          => $title,
			'description'    => $description,
			'status'         => $status,
			'display_order'  => $display_order,
			'created_at'     => date('Y-m-j H:i:s')
		);

		$this->db->insert('category', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function update($id, $title, $description, $status, $display_order)
	{
		$data = array(
			'title'          => $title,
			'description'    => $description,
			'status'         => $status,
			'display_order'  => $display_order,
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
