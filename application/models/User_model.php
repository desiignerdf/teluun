<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * User_model class.
 *
 * @extends CI_Model
 */
class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getItems()
	{
		$this->db->select('*');
		$this->db->from('user');

		$query = $this->db->get();
		return $query->result();
	}

	public function user_login($username, $password)
	{
		$this->db->select('password');
		$this->db->from('user');
		$this->db->where('email', $username);
		$hash = $this->db->get()->row('password');

		return $this->verify_password_hash($password, $hash);
	}

	public function get_user_id_from_username($username)
	{
		$this->db->select('id');
		$this->db->from('user');
		$this->db->where('email', $username);

		return $this->db->get()->row('id');
	}

	public function get_user($id)
	{
		$this->db->from('user');
		$this->db->where('id', $id);

		return $this->db->get()->row();
	}

	public function getUserByUID($uid)
	{
		$this->db->from('user');
		$this->db->where('uid', $uid);
		return $this->db->get()->row();
	}

	public function getUserByEmail($email)
	{
		$this->db->from('user');
		$this->db->where('email', $email);
		return $this->db->get()->row();
	}

	public function getPagedItems($limit = 15, $start = 0, $lastname = "", $firstname = "", $reg = "", $status = 0)
	{
		$this->db->select('*');
		$this->db->from('user');

		if ($status != 0) {
			$this->db->where('status', $status);
		}

		$this->db->where('id>', 1);

		if ($lastname != "") {
			$this->db->like('lastname', $lastname);
		}

		if ($firstname != "") {
			$this->db->like('firstname', $firstname);
		}

		$this->db->order_by('id', 'DESC');

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

	public function insert($firstname, $lastname, $email, $password, $status)
	{
		$data = array(
			'firstname'      => $firstname,
			'lastname'       => $lastname,
			'email'          => $email,
			'password'       => $this->hash_password($password),
			'status'         => $status,
			'created_at'     => date('Y-m-d H:i:s')
		);
		return $this->db->insert('user', $data);
	}

	public function update($id, $firstname, $lastname, $email, $password, $status)
	{
		if ($password == "password") {
			$data = array(
				'firstname'      => $firstname,
				'lastname'       => $lastname,
				'email'          => $email,
				'updated_at'     => date('Y-m-d H:i:s'),
				'status'         => $status
			);
		} else {
			$data = array(
				'firstname'     => $firstname,
				'lastname'      => $lastname,
				'email'         => $email,
				'password'      => $this->hash_password($password),
				'status'        => $status,
				'updated_at'    => date('Y-m-d H:i:s')
			);
		}

		$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}

	private function hash_password($password)
	{
		return password_hash($password, PASSWORD_BCRYPT);
	}

	private function verify_password_hash($password, $hash)
	{
		return password_verify($password, $hash);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('user');
	}
}
