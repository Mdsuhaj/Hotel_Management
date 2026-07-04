<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registration extends CI_Controller
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
        $this->data['Page_Title'] = 'Luxe stay - Create your accuount';
        $this->load->view('Registration/Index', $this->data);
    }

   public function Save_Registration()
{
    $Email = $this->input->post('Email');
    $Existing_User = $this->User_Model->Get_User_By_Email($Email);

    if (!empty($Existing_User)) {

        $this->session->set_flashdata('Error_Msg', 'An account with this email already exists.');
        redirect(base_url('Registration'));

    } else {

        $data = array(
            "FirstName" => $this->input->post('FirstName'),
            "LastName"  => $this->input->post('LastName'),
            "Email"     => $Email,
            "Password"  => $this->input->post('Password'),
            "MobileNo"  => $this->input->post('MobileNo'),
            "IsActive"  => 'Yes',
            "CreatedDate" => date('Ymd H:i:s')
        );

        $this->User_Model->Add_User($data);
        $this->session->set_flashdata('Success_Msg', 'Registration successful. Please login to continue.');
        redirect(base_url('Login'));
    }
}
}