<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * File_model class.
 *
 * @extends CI_Model
 */
class File_model extends CI_Model
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
		return $this->db->count_all("file");
	}

	public function getItems()
	{
		$this->db->from('file');
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get();

		return $query->result();
	}

	public function getPagedItems($limit = 15, $start = 0)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get("file");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	public function insert($name, $orignal_name, $type, $size, $width, $height)
	{
		$data = array(
			'file_name' => $name,
			'file_orignal_name' => $orignal_name,
			'file_type' => $type,
			'file_size' => $size,
			'file_width' => $width,
			'file_height' => $height,
			'file_height' => $height,
			'created_at' => date('Y-m-j H:i:s')
		);

		$this->db->insert('file', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function update($name, $orignal_name, $type, $size, $width, $height, $id)
	{
		$this->deleteFile($id);

		$data = array(
			'file_name' => $name,
			'file_orignal_name' => $orignal_name,
			'file_type' => $type,
			'file_size' => $size,
			'file_width' => $width,
			'file_height' => $height,
			'updated_at' => date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);

		return $this->db->update('file', $data);
	}

	public function delete_pdf($id)
	{
		$file = $this->getItemById($id);

		if (!$this->db->where('id', $id)->delete('file')) {
			return FALSE;
		}

		if ($file) {
			unlink('./uploads/pdf/' . $file->file_name);
		}

		return TRUE;
	}

	public function delete($id)
	{
		$file = $this->getItemById($id);

		if (!$this->db->where('id', $id)->delete('file')) {
			return FALSE;
		}

		if ($file) {
			unlink('./uploads/' . $file->file_name);
		}

		return TRUE;
	}


	public function deleteFile($id)
	{
		$file = $this->getItemById($id);
		if ($file) {
			unlink('./uploads/' . $file->file_name);
		}
		return TRUE;
	}

	public function getItemById($id)
	{
		$this->db->from('file');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}
}
