<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Admin_Model');
    }

    public function index()
    {
        $Session = $this->session->userdata('admin_sess_array');

        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'Admin') {

            redirect(base_url('Admin'));

        } else {

            $this->data['Page_Title'] = 'Luxe Stay - Admin Login';

            $this->load->view('Admin_Login/Index', $this->data);
        }
    }

    public function Login_Submit()
    {
        $Username = $this->input->post('Username');
        $Password = $this->input->post('Password');

        $Admin = $this->Admin_Model->Get_Admin_By_Username($Username);

        if (!empty($Admin) && $Admin->Password == $Password) {

            $sess_array = array(
                "IsOnLogin" => TRUE,
                "AdminID" => $Admin->AdminID,
                "Name" => $Admin->FullName,
                "UserRole" => 'Admin'
            );

            $this->session->set_userdata('admin_sess_array', $sess_array);

            redirect(base_url('Admin'));

        } else {

            $this->session->set_flashdata('Error_Msg', 'Invalid admin username or password.');
            redirect(base_url('Admin_Login'));
        }
    }

    public function Logout()
    {
        $this->session->unset_userdata('admin_sess_array');
        redirect(base_url('Admin_Login'));
    }
}
