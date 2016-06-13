<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: NhuTran
 * Date: 4/24/16
 * Time: 7:47 PM
 */
class User_management extends CI_Controller
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
        $data["title"] = "User management";
        $data["authenticated_user"] = $this->get_authenticated_user();
        $this->load->view('admin/users/index', $data);
    }

    public function load_data_table()
    {
        $list = $this->user_service->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $user->username;
            $row[] = $user->firstname;
            $row[] = $user->lastname;
            $row[] = $user->email;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_user(' . $user->id . ');"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_user(' . $user->id . ');"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user_service->count_all(),
            "recordsFiltered" => $this->user_service->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function get_update_user()
    {
        $data = $this->user_service->get_by_id($this->uri->segment(2));
        echo json_encode($data);
    }

    public function submit_create_user()
    {
        $this->_validate(false);
        $data = array(
            'username' => $this->input->post('userName'),
            'password' => MD5($this->input->post('password')),
            'firstname' => $this->input->post('firstName'),
            'lastname' => $this->input->post('lastName'),
            'email' => $this->input->post('email')
        );
        $id = $this->user_service->save($data);
        echo json_encode(array(
            "status" => TRUE,
            "id" => $id
        ));
    }

    private function _validate($isEdit)
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        $username = $this->input->post('userName');
        if (isset($isEdit)) {
            if ($username == '') {
                $data['inputerror'][] = 'userName';
                $data['error_string'][] = 'User name is required';
                $data['status'] = FALSE;
            } else {

            }
        }

        if ($this->input->post('password') == '') {
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'Password is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('email') == '') {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function submit_update_user()
    {
        $this->_validate(true);
        $data = array(
            'username' => $this->input->post('userName'),
            'password' => $this->input->post('password'),
            'firstname' => $this->input->post('firstName'),
            'lastname' => $this->input->post('lastName'),
            'email' => $this->input->post('email')
        );
        $this->user_service->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function submit_delete_user()
    {
        $this->user_service->delete_by_id($this->uri->segment(2));
        echo json_encode(array("status" => TRUE));
    }
}