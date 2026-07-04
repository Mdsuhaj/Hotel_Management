<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
 
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Room_Model');
    }
 
    public function index()
    {
        $Session = $this->session->userdata('sess_array');
 
        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'User') {
 
            $this->data['Page_Title'] = 'Luxe Stay - Room Availability';
            $this->data['Login_User'] = $Session['Name'];
 
            $this->data['Room_List'] = $this->Room_Model->Room_List();
 
            $this->load->view('Layout/Header', $this->data);
            $this->load->view('Dashboard/Index', $this->data);
            $this->load->view('Layout/Footer');
 
        } else {
            redirect(base_url('Login'));
        }
    }
}