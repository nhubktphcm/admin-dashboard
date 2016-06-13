<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_service', '', TRUE);
    }

    public function index()
    {
        if (!$this->is_login()) {
            $this->load_login_view();
            return;
        }
        $data["title"] = "Administration page";
        $data["authenticated_user"]=$this->get_authenticated_user();
        $this->load->view('admin/index', $data);
    }

    public function login_submit()
    {
        $data["title"] = "Login";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/security/login', $data);
        } else {
            redirect('administration', 'refresh');
        }

    }

    function logout()
    {
        $this->session->unset_userdata('authenticated_user');
        session_destroy();
        redirect('administration', 'refresh');
    }

    function check_database($password)
    {
        $username = $this->input->post('username');
        $result = $this->user_service->authenticate($username, $password);
        if ($result) {
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('authenticated_user', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }
}