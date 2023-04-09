<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Competition_model class.
 *
 * @extends CI_Model
 */
class Competition_model extends CI_Model
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
		return $this->db->count_all("competition");
	}

	public function getItems($competition_category_id = 0, $status = 0)
	{
		$this->db->select('competition.*, competition_category.name as competition_category_name, 
		competition_category.id as competition_category_id');

		$this->db->from('competition');
		$this->db->join('competition_category', 'competition_category.id = competition.competition_category_id');

		if ($competition_category_id != 0) {
			$this->db->where('competition.competition_category_id', $competition_category_id);
		}

		if ($status != 0) {
			$this->db->where('competition.status', 1);
		}

		$this->db->order_by('competition.display_order', 'ASC');

		$query = $this->db->get();
		return $query->result();
	}

	public function getPagedItems($limit = 50, $start = 0, $competition_category_id = 0, $status = 0)
	{
		$this->db->select('competition.*, competition_category.name as competition_category_name, 
		competition_category.id as competition_category_id');

		$this->db->from('competition');
		$this->db->join('competition_category', 'competition_category.id = competition.competition_category_id');

		if ($competition_category_id != 0) {
			$this->db->where('competition.competition_category_id', $competition_category_id);
		}

		if ($status != 0) {
			$this->db->where('competition.status', 1);
		}

		$this->db->order_by('competition.display_order', 'ASC');

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

	public function insert(
		$competition_category_id,
		$team_one,
		$team_two,
		$play_status,
		$team_one_point,
		$team_two_point,
		$win_status,
		$play_date,
		$address,
		$description,
		$status,
		$display_order
	) {
		$data = array(
			'competition_category_id'   => $competition_category_id,
			'team_one'                  => $team_one,
			'team_two'                  => $team_two,
			'play_status'               => $play_status,
			'team_one_point'            => $team_one_point,
			'team_two_point'            => $team_two_point,
			'win_status'                => $win_status,
			'play_date'                 => $play_date,
			'address'                   => $address,
			'description'               => $description,
			'status'                    => $status,
			'display_order'             => $display_order,
			'created_at'                => date('Y-m-j H:i:s')
		);

		$this->db->insert('competition', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function update(
		$cid,
		$competition_category_id,
		$team_one,
		$team_two,
		$play_status,
		$team_one_point,
		$team_two_point,
		$win_status,
		$play_date,
		$address,
		$description,
		$status,
		$display_order
	) {
		$data = array(
			'competition_category_id'   => $competition_category_id,
			'team_one'                  => $team_one,
			'team_two'                  => $team_two,
			'play_status'               => $play_status,
			'team_one_point'            => $team_one_point,
			'team_two_point'            => $team_two_point,
			'win_status'                => $win_status,
			'play_date'                 => $play_date,
			'address'                   => $address,
			'description'               => $description,
			'status'                    => $status,
			'display_order'             => $display_order,
			'updated_at'                => date('Y-m-d H:i:s')
		);

		$this->db->where('id', $cid);
		return $this->db->update('competition', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);

		return $this->db->delete('competition');
	}

	public function getItemById($id)
	{
		$this->db->select('competition.*, competition_category.name as competition_category_name, competition_category.id as competition_category_id');
		$this->db->from('competition');
		$this->db->join('competition_category', 'competition_category.id = competition.competition_category_id');

		$this->db->where('competition.id', $id);

		return $this->db->get()->row();
	}
}
