<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('User_Model');
    }

    public function index()
    {
        $Session = $this->session->userdata('sess_array');

        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'User') {

            redirect(base_url('Dashboard'));

        } else {

            $this->data['Page_Title'] = 'Luxe Stay - Login';
            $this->load->view('Login/Index', $this->data);
        }
    }

    public function Login_Submit()
    {
        $Email    = $this->input->post('Email');
        $Password = $this->input->post('Password');

        $User = $this->User_Model->Get_User_By_Email($Email);

        if (!empty($User) && $User->Password == $Password) {

            $sess_array = array(
                "IsOnLogin" => TRUE,
                "UserID"    => $User->UserID,
                "Name"      => $User->FirstName . ' ' . $User->LastName,
                "Email"     => $User->Email,
                "UserRole"  => 'User'
            );

            $this->session->set_userdata('sess_array', $sess_array);
            redirect(base_url('Dashboard'));

        } else {

            $this->session->set_flashdata('Error_Msg', 'Invalid email or password.');
            redirect(base_url('Login'));
        }
    }

    public function Logout()
    {
        $this->session->unset_userdata('sess_array');
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }
}