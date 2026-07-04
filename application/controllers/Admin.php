<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Admin_Model');
        $this->load->model('User_Model');
        $this->load->model('Room_Model');
    }

    public function index()
    {
        $Session = $this->session->userdata('admin_sess_array');

        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'Admin') {

            $this->data['Page_Title'] = 'Luxe Stay - Admin Dashboard';
            $this->data['Login_User'] = $Session['Name'];

            $this->data['Room_Stats'] = $this->Admin_Model->Get_Room_Stats();
            $this->data['Recent_Bookings'] = $this->Admin_Model->Get_Recent_Bookings();

            $this->load->view('Layout/Header', $this->data);
            $this->load->view('Layout/Admin_Sidebar', $this->data);
            $this->load->view('Admin/Dashboard', $this->data);
            $this->load->view('Layout/Admin_Footer');

        } else {
            redirect(base_url('Admin_Login'));
        }
    }

    public function Manage_Users()
    {
        $Session = $this->session->userdata('admin_sess_array');

        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'Admin') {

            $this->data['Page_Title'] = 'Luxe Stay - Manage Users';
            $this->data['Login_User'] = $Session['Name'];

            $this->data['User_List'] = $this->User_Model->Get_All_Users();

            $this->load->view('Layout/Header', $this->data);
            $this->load->view('Layout/Admin_Sidebar', $this->data);
            $this->load->view('Admin/Manage_Users', $this->data);
            $this->load->view('Layout/Admin_Footer');

        } else {
            redirect(base_url('Admin_Login'));
        }
    }

    public function Edit_User($UserID)
    {
        $Session = $this->session->userdata('admin_sess_array');

        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'Admin') {

            $this->data['Page_Title'] = 'Luxe Stay - Edit User';
            $this->data['Login_User'] = $Session['Name'];

            $this->data['User_Detail'] = $this->User_Model->Get_User_By_ID($UserID);

            $this->load->view('Layout/Header', $this->data);
            $this->load->view('Layout/Admin_Sidebar', $this->data);
            $this->load->view('Admin/Edit_User', $this->data);
            $this->load->view('Layout/Admin_Footer');

        } else {
            redirect(base_url('Admin_Login'));
        }
    }

    public function Update_User()
    {
        $Session = $this->session->userdata('admin_sess_array');

        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'Admin') {

            $UserID = $this->input->post('UserID');

            $data = array(
                "FirstName" => $this->input->post('FirstName'),
                "LastName"  => $this->input->post('LastName'),
                "MobileNo"  => $this->input->post('MobileNo'),
                "IsActive"  => $this->input->post('IsActive')
            );

            $this->User_Model->Update_User($UserID, $data);

            redirect(base_url('Admin/Manage_Users'));

        } else {
            redirect(base_url('Admin_Login'));
        }
    }

    // ---- NEW METHOD: Check In ----
    public function CheckIn($BookingID)
    {
        $Session = $this->session->userdata('admin_sess_array');

        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'Admin') {

            $this->db->where('BookingID', $BookingID);
            $this->db->update('Booking_Mst', array('BookingStatus' => 'CheckedIn'));

            $sql = "SELECT RoomID FROM Booking_Mst WHERE BookingID = '$BookingID'";
            $query = $this->db->query($sql);
            $result = $query->row();

            if (!empty($result->RoomID)) {
                $this->db->where('RoomID', $result->RoomID);
                $this->db->update('Room_Mst', array('Status' => 'CheckedIn'));
            }

            redirect(base_url('Admin'));

        } else {
            redirect(base_url('Admin_Login'));
        }
    }

    // ---- NEW METHOD: Check Out ----
    public function CheckOut($BookingID)
    {
        $Session = $this->session->userdata('admin_sess_array');

        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'Admin') {

            $this->db->where('BookingID', $BookingID);
            $this->db->update('Booking_Mst', array('BookingStatus' => 'CheckedOut'));

            $sql = "SELECT RoomID FROM Booking_Mst WHERE BookingID = '$BookingID'";
            $query = $this->db->query($sql);
            $result = $query->row();

            if (!empty($result->RoomID)) {
                $this->db->where('RoomID', $result->RoomID);
                $this->db->update('Room_Mst', array('Status' => 'Available'));
            }

            redirect(base_url('Admin'));

        } else {
            redirect(base_url('Admin_Login'));
        }
    }
}