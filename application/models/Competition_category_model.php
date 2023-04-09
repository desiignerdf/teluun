<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Competition_category class.
 *
 * @extends CI_Model
 */
class Competition_category_model extends CI_Model
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
		return $this->db->count_all('competition_category');
	}

	public function getItems($q = "", $status = 0)
	{
		$this->db->select('*');
		$this->db->from('competition_category');

		if ($status != 0) {
			$this->db->where('status', 1);
		}

		if ($q != "") {
			$this->db->like('name', $q);
		}

		$this->db->order_by('display_order', "ASC");
		$this->db->order_by('id', "DESC");

		$query = $this->db->get();
		return $query->result();
	}

	public function getPagedItems($limit = 15, $start = 0,  $q = "", $status = 0)
	{
		$this->db->select('*');
		$this->db->from('competition_category');

		if ($status != 0) {
			$this->db->where('status', 1);
		}

		if ($q != "") {
			$this->db->like('name', $q);
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

	public function insert($name, $file_id, $status, $display_order)
	{
		$data = array(
			'name'           => $name,
			'file_id'        => $file_id,
			'status'         => $status,
			'display_order'  => $display_order,
			'created_at'     => date('Y-m-j H:i:s')
		);

		$this->db->insert('competition_category', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function update($id, $name, $file_id, $status, $display_order)
	{
		$data = array(
			'name'           => $name,
			'file_id'        => $file_id,
			'status'         => $status,
			'display_order'  => $display_order,
			'updated_at'     => date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		return $this->db->update('competition_category', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('competition_category');
	}

	public function getItemById($id)
	{
		$this->db->from('competition_category');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}
}
