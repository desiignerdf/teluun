<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Competition extends Admin_Controller
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
        $this->load->model('competition_model');
        $this->load->model('competition_category_model');
        $this->load->model('teams_model');
    }

    public function index()
    {
        $data = new stdClass();

        if ($this->logged_id()) {
            $q = 0;
            if (isset($_GET['q'])) {
                $q = $_GET['q'];
            }

            $data->q = $q;

            $config = array();
            $config['per_page'] = 100;
            $config["uri_segment"] = 3;
            $config["base_url"] = base_url() . "admin/competition";
            $config["total_rows"] = count($this->competition_model->getItems());

            $this->pagination->initialize($config);
            $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
            $data->items = $this->competition_model->getPagedItems($config["per_page"], $page, $q, 0);
            $data->links = $this->pagination->create_links();

            $data->view = 'admin/competition/list';
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
                $data->teams = $this->teams_model->getItems("", 1);
                $data->competition_category = $this->competition_category_model->getItems("", 1);

                $data->view = 'admin/competition/add';
                $this->load->view('layouts/layout-admin', $data);
            } else {
                // set variables from the form
                $competition_category_id       = $this->input->post('competition_category_id');
                $team_one                      = $this->input->post('team_one');
                $team_two                      = $this->input->post('team_two');
                $play_status                   = $this->input->post('play_status');

                if ($play_status == 1) {
                    $team_one_point       = $this->input->post('team_one_point');
                    $team_two_point       = $this->input->post('team_two_point');
                    $win_status           = $this->input->post('win_status');
                }

                $play_date            = $this->input->post('play_date');
                $address                       = $this->input->post('address');
                $description                   = $this->input->post('description');
                $status                        = $this->input->post('status');
                $display_order                 = $this->input->post('display_order');

                if ($this->competition_model->insert(
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
                )) {
                    $this->session->set_flashdata('success', 'Тэмцээний оноолт амжилттай нэмлээ.');
                } else {
                    $this->session->set_flashdata('error', 'Тэмцээний оноолт нэмэх үед алдаа гарлаа. Та дахин нэмнэ үү.');
                }
                redirect('admin/competition');
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
                $competition = $this->competition_model->getItemById($id);
                $data->teams = $this->teams_model->getItems("", 1);
                $data->competition_category = $this->competition_category_model->getItems("", 1);

                if ($competition) {
                    $data->cid = $competition->id;
                    $data->competition_category_id = $competition->competition_category_id;
                    $data->team_one = $competition->team_one;
                    $data->team_two = $competition->team_two;
                    $data->play_status = $competition->play_status;
                    $data->team_one_point = $competition->team_one_point;
                    $data->team_two_point = $competition->team_two_point;
                    $data->win_status = $competition->win_status;
                    $data->play_date = $competition->play_date;
                    $data->address = $competition->address;
                    $data->description = $competition->description;
                    $data->status = $competition->status;
                    $data->display_order = $competition->display_order;
                    // validation not ok, send validation errors to the view
                    $data->view = 'admin/competition/edit';
                    $this->load->view('layouts/layout-admin', $data);
                } else {
                    $this->session->set_flashdata('error', 'Засах боломжгүй байна.');
                    redirect('admin/competition');
                }
            } else {
                // set variables from the form
                $cid               = $this->input->post('cid');
                $competition_category_id       = $this->input->post('competition_category_id');
                $team_one                      = $this->input->post('team_one');
                $team_two                      = $this->input->post('team_two');
                $play_status                   = $this->input->post('play_status');

                if ($play_status == 1) {
                    $team_one_point       = $this->input->post('team_one_point');
                    $team_two_point       = $this->input->post('team_two_point');
                    $win_status           = $this->input->post('win_status');
                }

                $play_date            = $this->input->post('play_date');
                $address                       = $this->input->post('address');
                $description                   = $this->input->post('description');
                $status                        = $this->input->post('status');
                $display_order                 = $this->input->post('display_order');

                if ($this->competition_model->update(
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
                )) {
                    $this->session->set_flashdata('success', 'Тэмцээний оноолт амжилттай заслаа.');
                } else {
                    $this->session->set_flashdata('error', 'Тэмцээний оноолт засах үед алдаа гарлаа. Та дахин засна уу.');
                }
                redirect('admin/competition');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function delete($id)
    {
        if ($this->logged_id()) {
            if ($this->competition_model->delete($id)) {
                $this->session->set_flashdata('success', 'Тэмцээний оноолт амжилттай устгалаа.');
            } else {
                $this->session->set_flashdata('error', 'Тэмцээний оноолт устгах үед алдаа гарлаа. Та дахин оролдоно уу.');
            }
            redirect('admin/competition');
        } else {
            redirect('admin/login');
        }
    }
}
