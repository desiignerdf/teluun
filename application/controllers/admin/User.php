<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends Admin_Controller
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
        $this->load->model('user_model');
    }

    public function index()
    {
        if ($this->logged_id()) {
            $data = new stdClass();

            $config = array();
            $config['per_page'] = 15;
            $config["uri_segment"] = 3;
            $config["base_url"] = base_url() . "admin/user";
            $config["total_rows"] = count($this->user_model->getItems());
            $this->pagination->initialize($config);
            $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;

            $data->items = $this->user_model->getPagedItems($config["per_page"], $page);
            $data->links = $this->pagination->create_links();

            $data->page = $page;

            $data->view = 'admin/user/list';
            $this->load->view('layouts/layout-admin', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function add()
    {
        if ($this->logged_id()) {
            $data = new stdClass();

            $this->form_validation->set_rules('firstname', 'Нэр', 'trim|required');
            $this->form_validation->set_rules('lastname', 'Овог', 'trim|required');
            $this->form_validation->set_rules('email', 'И-мэйл', 'trim|required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
            if ($this->form_validation->run() === false) {
                // validation not ok, send validation errors to the view
                $data->view = 'admin/user/add';
                $this->load->view('layouts/layout-admin', $data);
            } else {
                // set variables from the form
                $firstname       = $this->input->post('firstname');
                $lastname        = $this->input->post('lastname');
                $email           = $this->input->post('email');
                $password        = $this->input->post('password');
                $status          = $this->input->post('status');

                if ($this->user_model->insert($firstname, $lastname, $email, $password, $status)) {
                    $this->session->set_flashdata('success', 'Хэрэглэгч амжилттай нэмлээ.');
                } else {
                    $this->session->set_flashdata('error', 'Хэрэглэгч нэмэх үед алдаа гарлаа. Та дахин нэмнэ үү.');
                }
                redirect('admin/user');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function edit($id)
    {
        if ($this->logged_id()) {
            $data = new stdClass();

            // set validation rules
            $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');

            if ($this->input->post('email') != $this->input->post('email_check'))
                $this->form_validation->set_rules('email', 'И-мэйл', 'trim|required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');

            if ($this->form_validation->run() === false) {
                $user = $this->user_model->get_user($id);
                if ($user) {
                    $data->id             = $user->id;
                    $data->firstname      = $user->firstname;
                    $data->lastname       = $user->lastname;
                    $data->email          = $user->email;
                    $data->status         = $user->status;

                    // validation not ok, send validation errors to the view
                    $data->view = 'admin/user/edit';
                    $this->load->view('layouts/layout-admin', $data);
                } else {
                    $this->session->set_flashdata('error', 'Энэ хэрэглэгчийн мэдээллийг засах боломжгүй байна.');
                    redirect('admin/user');
                }
            } else {
                // set variables from the form
                $id              = $this->input->post('id');
                $firstname       = $this->input->post('firstname');
                $lastname        = $this->input->post('lastname');
                $email           = $this->input->post('email');
                $password        = $this->input->post('password');
                $status          = $this->input->post('status');

                if ($this->user_model->update($id, $firstname, $lastname, $email, $password, $status)) {
                    $this->session->set_flashdata('success', 'Хэрэглэгчийн мэдээлэл амжилттай заслаа.');
                } else {
                    $this->session->set_flashdata('error', 'Хэрэглэгчийн мэдээлэл засах үед алдаа гарлаа. Та дахин засна уу.');
                }
                redirect('admin/user');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function delete($id)
    {
        if ($this->logged_id()) {
            if ($this->user_model->delete($id)) {
                $this->session->set_flashdata('success', 'Хэрэглэгч амжилттай устгалаа.');
            } else {
                $this->session->set_flashdata('error', 'Хэрэглэгч устгах үед алдаа гарлаа. Та дахин оролдоно уу.');
            }
            redirect('admin/user');
        } else {
            redirect('admin/login');
        }
    }
}
