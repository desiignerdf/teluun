<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper(array('url'));
        $this->load->library(array('session'));
        $this->load->library('pagination');
    }

    public function getImage($file_id)
    {
        $file = $this->file_model->getItemById($file_id);
        if ($file) {
            return base_url('uploads/' . $file->file_name);
        } else {
            return base_url('assets/images/placeholder.jpg');
        }
    }
}

class Admin_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('file_model');
    }

    public function logged_id()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            return true;
        } else {
            return false;
        }
    }
}

class User_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('file_model');
    }
}
